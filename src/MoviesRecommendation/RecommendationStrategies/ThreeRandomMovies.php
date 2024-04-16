<?php
declare(strict_types=1);

namespace MoviesRecommendation\RecommendationStrategies;

use MoviesRecommendation\RecommendationStrategiesInterface;

class ThreeRandomMovies implements RecommendationStrategiesInterface
{
    private const NUMBER_OF_RANDOM_MOVIES = 3;

    public function getRecommendation(array $movies): array
    {
        if (empty($movies)) {
            return [];
        }

        $randomMovies = array_rand($movies, self::NUMBER_OF_RANDOM_MOVIES);
        $result = [];

        foreach ($randomMovies as $index) {
            $result[] = $movies[$index];
        }

        return $result;
    }
}