<?php

namespace Benzas\RankingBundle\Ranking;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class RankingHandler
{
    public function __construct(
        #[AutowireIterator('ranking.strategy')]
        private readonly iterable $strategies,
    ) {}

    public function rank(object $subject, iterable $candidates): array
    {
        $unique = [];
        foreach ($candidates as $candidate) {
            $unique[$candidate->getId()] = $candidate;
        }

        $scores = [];
        foreach ($unique as $id => $candidate) {
            $scores[$id] = 0;
            foreach ($this->strategies as $strategy) {
                $scores[$id] += $strategy->score($subject, $candidate);
            }
        }

        arsort($scores);

        return array_values(array_map(fn (int $id) => $unique[$id], array_keys($scores)));
    }
}
