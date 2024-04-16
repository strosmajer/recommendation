<?php
declare(strict_types=1);

namespace MoviesRecommendation;

use MoviesRecommendation\RecommendationStrategies\MultiWordMovies;
use MoviesRecommendation\RecommendationStrategies\StartingWithWEvenNumberCharacters;
use MoviesRecommendation\RecommendationStrategies\ThreeRandomMovies;
use Exception;

class MoviesRecommendationEngineResolver
{
    public const THREE_RANDOM_MOVIES = 1;
    public const STARTING_WITH_W_AND_EVEN_NUMBER_CHARACTERS = 2;
    public const MULTI_WORD_MOVIES = 3;

    /**
     * @throws Exception
     */
    public function getEngine(int $recommendationEngine) : RecommendationStrategiesInterface
    {
        return match ($recommendationEngine) {
            self::THREE_RANDOM_MOVIES => new ThreeRandomMovies(),
            self::STARTING_WITH_W_AND_EVEN_NUMBER_CHARACTERS => new StartingWithWEvenNumberCharacters(),
            self::MULTI_WORD_MOVIES => new MultiWordMovies(),
            default => throw new Exception('Cant find recommendation engine (' . $recommendationEngine . ') '),
        };
    }
}