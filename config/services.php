<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Benzas\Ranking\Strategies\RankingStrategyInterface;
use Benzas\RankingBundle\Ranking\RankingHandler;

return static function (ContainerConfigurator $container) {
    $services = $container->services();
    $services
        ->instanceof(RankingStrategyInterface::class)
        ->tag('ranking.strategy');

    $services
        ->load('Benzas\\RankingBundle\\', __DIR__ . '/../src/')
        ->exclude(['../src/DependencyInjection']);

    $services->set(RankingHandler::class)
        ->args([tagged_iterator('ranking.strategy')]);
};
