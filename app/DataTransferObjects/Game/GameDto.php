<?php

namespace App\DataTransferObjects\Game;

use Spatie\DataTransferObject\DataTransferObject;

class GameDto extends DataTransferObject
{
    public string $slug;
    public string $name;
    public int $playtime;
    public array $platforms;
    public ?array $stores;
    public string $released;
    public bool $tba;
    public ?string $backgroundImage;
    public float $rating;
    public ?int $ratingTop;
    public array $ratings;
    public ?int $ratingsCount;
    public ?int $reviewsTextCount;
    public int $added;
    public ?array $addedByStatus;
    public ?int $metacritic;
    public ?int $suggestionsCount;
    public string $updated;
    public int $id;
    public ?float $score;
    public array $tags;
    public ?array $esrbRating;
    public ?int $reviewsCount;
    public ?array $shortScreenshots;
    public ?array $parentPlatforms;
    public ?array $genres;
}
