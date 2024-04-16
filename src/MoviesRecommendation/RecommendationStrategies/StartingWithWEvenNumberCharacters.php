<?php
declare(strict_types=1);

namespace MoviesRecommendation\RecommendationStrategies;

use MoviesRecommendation\RecommendationStrategiesInterface;

class StartingWithWEvenNumberCharacters implements RecommendationStrategiesInterface
{
    private const SEARCH_PATTERN = '/^W.*$/i';

    public function getRecommendation(array $movies): array
    {
        if (empty($movies)) {
            return [];
        }

        $result = [];

        foreach ($movies as $movie) {
            if (preg_match(self::SEARCH_PATTERN, $movie) && strlen($movie) % 2 == 0) {
                $result[] = $movie;
            }
        }

        return $result;
    }
}