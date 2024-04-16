<?php
declare(strict_types=1);

use MoviesRecommendation\RecommendationStrategies\StartingWithWEvenNumberCharacters;
use PHPUnit\Framework\TestCase;

class StartingWithWEvenNumberCharactersTest extends TestCase
{
    /**
     * @dataProvider moviesData
     */
    public function testGetRecommendation(array $movies, array $expectedResult)
    {
        $startingWithWEvenNumberCharacters = new StartingWithWEvenNumberCharacters();
        $result = $startingWithWEvenNumberCharacters->getRecommendation($movies);
        $this->assertEquals($expectedResult, $result);
    }

    public static function moviesData(): array
    {
        return [
            'standardData' => [
                ['Wonder Woman', 'Matrix', 'WALL-E', 'Interstellar', 'Wolverine'],
                ['Wonder Woman', 'WALL-E'],
            ],
            'noRecommendation' => [
                ['Incepcja', 'Matrix', 'Wolverine'],
                []
            ],
            'noData' => [
                [],
                []
            ]
        ];
    }
}