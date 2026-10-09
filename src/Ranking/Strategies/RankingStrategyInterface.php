<?php

namespace Benzas\Ranking\Strategies;

interface RankingStrategyInterface
{
    public function score(object $subject, object $candidate): int;
}
