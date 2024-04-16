<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MoviesRecommendation\RecommendationStrategies\MultiWordMovies;

class MultiWordMoviesTest extends TestCase
{
    /**
     * @dataProvider moviesData
     */
    public function testGetRecommendationReturnsMultiWordMovies(array $movies, array $expectedResult)
    {
        $multiWordMovies = new MultiWordMovies();
        $result = $multiWordMovies->getRecommendation($movies);
        $this->assertEquals($expectedResult, $result);
    }

    public static function moviesData(): array
    {
        return [
            'standardData' => [
                ['The Shawshank Redemption', 'Incepcja', 'The Lord of the Rings'],
                ['The Shawshank Redemption', 'The Lord of the Rings'],
            ],
            'noRecommendation' => [
                ['Incepcja', 'Matrix', 'Pi'],
                []
            ],
            'withLeastTwoWords' => [
                ['Młode wilki', 'Forest Gump', 'Gran Torino'],
                ['Młode wilki', 'Forest Gump', 'Gran Torino']
            ],
            'noData' => [
                [],
                []
            ]
        ];
    }
}