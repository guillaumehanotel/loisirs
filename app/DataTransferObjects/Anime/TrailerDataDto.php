<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class TrailerDataDto extends DataTransferObject
{
    public ?string $youtube_id;
    public ?string $url;
    public ?string $embed_url;
    public TrailerImagesDto $images;
}
