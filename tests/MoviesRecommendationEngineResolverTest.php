<?php
declare(strict_types=1);

use MoviesRecommendation\MoviesRecommendationEngineResolver;
use MoviesRecommendation\RecommendationStrategies\ThreeRandomMovies;
use MoviesRecommendation\RecommendationStrategies\StartingWithWEvenNumberCharacters;
use MoviesRecommendation\RecommendationStrategies\MultiWordMovies;
use PHPUnit\Framework\TestCase;

class MoviesRecommendationEngineResolverTest extends TestCase
{
    private const FAKE_ENGINE = 100;

    public function testRecommendationEngineResolver(): void
    {
        $recommendationEngineResolver = new MoviesRecommendationEngineResolver();

        $engine = $recommendationEngineResolver->getEngine(MoviesRecommendationEngineResolver::THREE_RANDOM_MOVIES);
        $this->assertInstanceOf(ThreeRandomMovies::class, $engine);

        $engine = $recommendationEngineResolver->getEngine(MoviesRecommendationEngineResolver::STARTING_WITH_W_AND_EVEN_NUMBER_CHARACTERS);
        $this->assertInstanceOf(StartingWithWEvenNumberCharacters::class, $engine);

        $engine = $recommendationEngineResolver->getEngine(MoviesRecommendationEngineResolver::MULTI_WORD_MOVIES);
        $this->assertInstanceOf(MultiWordMovies::class, $engine);

        $this->expectException(Exception::class);
        $engine = $recommendationEngineResolver->getEngine(self::FAKE_ENGINE);
    }
}