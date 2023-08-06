<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class ImageDataDto extends DataTransferObject
{
    public JpgImageDto $jpg;
    public WebpImageDto $webp;
}
