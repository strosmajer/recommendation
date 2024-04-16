<?php
declare(strict_types=1);

use MoviesRecommendation\RecommendationStrategies\ThreeRandomMovies;
use PHPUnit\Framework\TestCase;

class ThreeRandomMoviesTest extends TestCase
{
    /**
     * @dataProvider moviesData
     */
    public function testGetRecommendationReturnsArrayOfThreeRandomMovies(array $movies, int $expectedResult): void
    {
        $threeRandomMovies = new ThreeRandomMovies();
        $result = $threeRandomMovies->getRecommendation($movies);
        $this->assertCount($expectedResult, $result);
        foreach ($result as $movie) {
            $this->assertContains($movie, $movies);
        }
    }

    public static function moviesData(): array
    {
        return [
            'standardData' => [
                ['The Shawshank Redemption', 'Incepcja', 'The Lord of the Rings', 'Matrix', 'Pi'],
                3,
            ],
            'noData' => [
                [],
                0
            ]
        ];
    }
}