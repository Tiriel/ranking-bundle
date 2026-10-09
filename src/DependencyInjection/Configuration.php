<?php

namespace Benzas\RankingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('benzas_ranking');
        $builder->getRootNode()
            ->children()
                ->integerNode('default_weight')->min(0)->defaultValue(1)->end()
                ->arrayNode('strategies')
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->children()
                            ->stringNode('class')->isRequired()
                                ->validate()
                                    ->ifFalse(fn(string $name) => \class_exists($name))
                                    ->thenInvalid('Class must exist.')
                                ->end()
                            ->end()
                            ->integerNode('weight')->min(0)->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}