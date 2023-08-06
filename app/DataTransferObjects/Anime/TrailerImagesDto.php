<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class TrailerImagesDto extends DataTransferObject
{
    public ?string $image_url;
    public ?string $small_image_url;
    public ?string $medium_image_url;
    public ?string $large_image_url;
    public ?string $maximum_image_url;
}
