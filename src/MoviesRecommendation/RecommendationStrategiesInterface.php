<?php
declare(strict_types=1);

namespace MoviesRecommendation;

interface RecommendationStrategiesInterface
{
    public function getRecommendation(array $movies): array;
}