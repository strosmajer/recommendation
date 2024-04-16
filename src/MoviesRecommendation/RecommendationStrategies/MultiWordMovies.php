<?php
declare(strict_types=1);

namespace MoviesRecommendation\RecommendationStrategies;

use MoviesRecommendation\RecommendationStrategiesInterface;

class MultiWordMovies implements RecommendationStrategiesInterface
{
    private const WORLD_SEPARATOR = ' ';
    private const SEARCH_PATTERN = '/[^\s]+' . self::WORLD_SEPARATOR . '[^\s]+/';

    public function getRecommendation(array $movies): array
    {
        if (empty($movies)) {
            return [];
        }

        $multiWordMovies = array();
        foreach ($movies as $movie) {
            if (preg_match(self::SEARCH_PATTERN, $movie)) {
                $multiWordMovies[] = $movie;
            }
        }

        return $multiWordMovies;
    }
}