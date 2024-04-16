<?php
declare(strict_types=1);

use MoviesRecommendation\MoviesRecommendationEngineResolver;

require_once __DIR__ . '/vendor/autoload.php';

$movies = [
    "Pulp Fiction",
    "Incepcja",
    "Skazani na Shawshank",
    "Dwunastu gniewnych ludzi",
    "Ojciec chrzestny",
    "Django",
    "Matrix",
    "Leon zawodowiec",
    "Siedem",
    "Nietykalni",
    "Władca Pierścieni: Powrót króla",
    "Fight Club",
    "Forrest Gump",
    "Chłopaki nie płaczą",
    "Gladiator",
    "Człowiek z blizną",
    "Pianista",
    "Doktor Strange",
    "Szeregowiec Ryan",
    "Lot nad kukułczym gniazdem",
    "Wielki Gatsby",
    "Avengers: Wojna bez granic",
    "Życie jest piękne",
    "Pożegnanie z Afryką",
    "Szczęki",
    "Milczenie owiec",
    "Dzień świra",
    "Blade Runner",
    "Labirynt",
    "Król Lew",
    "La La Land",
    "Whiplash",
    "Wyspa tajemnic",
    "Django",
    "American Beauty",
    "Szósty zmysł",
    "Gwiezdne wojny: Nowa nadzieja",
    "Mroczny Rycerz",
    "Władca Pierścieni: Drużyna Pierścienia",
    "Harry Potter i Kamień Filozoficzny",
    "Green Mile",
    "Iniemamocni",
    "Shrek",
    "Mad Max: Na drodze gniewu",
    "Terminator 2: Dzień sądu",
    "Piraci z Karaibów: Klątwa Czarnej Perły",
    "Truman Show",
    "Skazany na bluesa",
    "Infiltracja",
    "Gran Torino",
    "Spotlight",
    "Mroczna wieża",
    "Rocky",
    "Casino Royale",
    "Drive",
    "Piękny umysł",
    "Władca Pierścieni: Dwie wieże",
    "Zielona mila",
    "Requiem dla snu",
    "Forest Gump",
    "Requiem dla snu",
    "Milczenie owiec",
    "Czarnobyl",
    "Breaking Bad",
    "Nędznicy",
    "Seksmisja",
    "Pachnidło",
    "Nagi instynkt",
    "Zjawa",
    "Igrzyska śmierci",
    "Kiler",
    "Siedem dusz",
    "Dzień świra",
    "Upadek",
    "Lśnienie",
    "Pan życia i śmierci",
    "Gladiator",
    "Granica",
    "Hobbit: Niezwykła podróż",
    "Pachnidło: Historia mordercy",
    "Wielki Gatsby",
    "Titanic",
    "Sin City",
    "Przeminęło z wiatrem",
    "Królowa śniegu",
];
$moviesRecommendationResolver = new MoviesRecommendationEngineResolver();


if (!isset($argv[1])) {
    die('!!! PLEASE SELECT RECOMMENDATION ENGINE : 
        1 - THREE RANDOM MOVIES (php runMe.php 1 )
        2 - STARTING WITH W AND EVEN NUMBER CHARACTERS (php runMe.php 2 )
        3 - MULTI WORD MOVIE (php runMe.php 3 )
       ');


}
$selectedEngine = (int)$argv[1];

try {
    $recommendationEngine = $moviesRecommendationResolver->getEngine($selectedEngine);
} catch(Exception $e) {
    die($e->getMessage());
}

print_r($recommendationEngine->getRecommendation($movies));