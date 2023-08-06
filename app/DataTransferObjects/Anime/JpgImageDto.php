<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class JpgImageDto extends DataTransferObject
{
    public string $image_url;
    public string $small_image_url;
    public string $large_image_url;
}
