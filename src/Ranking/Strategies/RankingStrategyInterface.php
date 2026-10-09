<?php

namespace Benzas\Ranking\Strategies;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[Autoconfigure(tags: ['ranking.strategy'])]
interface RankingStrategyInterface
{
    public function score(object $subject, object $candidate): int;
}
