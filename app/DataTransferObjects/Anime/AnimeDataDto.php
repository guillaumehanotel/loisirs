<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class AnimeDataDto extends DataTransferObject
{
    public int $mal_id;
    public string $url;
    public ImageDataDto $images;
    public TrailerDataDto $trailer;
    public bool $approved;
    public array $titles; // or TitleDataDto[]
    public string $title;
    public ?string $title_english;
    public ?string $title_japanese;
    public array $title_synonyms;
    public string $type;
    public string $source;
    public ?int $episodes;
    public string $status;
    public bool $airing;
    public AiredDataDto $aired;
    public string $duration;
    public string $rating;
    public float $score;
    public int $scored_by;
    public int $rank;
    public int $popularity;
    public int $members;
    public int $favorites;
    public string $synopsis;
    public ?string $background;
    public ?string $season;
    public ?int $year;
    public BroadcastDataDto $broadcast;
    public array $producers; // or ProducerDataDto[]
    public array $licensors; // or LicensorDataDto[]
    public array $studios; // or StudioDataDto[]
    public array $genres; // or GenreDataDto[]
    public array $explicit_genres;
    public array $themes; // or ThemeDataDto[]
    public array $demographics;

}
