<?php


namespace Benzas\RankingBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class BenzasRankingBundle extends AbstractBundle
{
    //public function configure(DefinitionConfigurator $definition): void
    //{
    //    $definition->rootNode()
    //        ->children()
    //            ->integerNode('default_weight')->min(0)->defaultValue(1)->end()
    //            ->arrayNode('strategies')
    //                ->useAttributeAsKey('name')
    //                    ->arrayPrototype()
    //                        ->children()
    //                            ->stringNode('class')->isRequired()
    //                                ->validate()
    //                                    ->ifFalse(fn(string $name) => \class_exists($name))
    //                                    ->thenInvalid('Class must exist.')
    //                                ->end()
    //                            ->end()
    //                            ->integerNode('weight')->min(0)->isRequired()->end()
    //                        ->end()
    //                    ->end()
    //                ->end()
    //            ->end()
    //        ->end();
    //}

    public function loadExtension(array $config, ContainerConfigurator $configurator, ContainerBuilder $container): void
    {
        $configurator->import(__DIR__ . '/../config/services.php');
    }
}