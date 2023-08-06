<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class BroadcastDataDto extends DataTransferObject
{
    public ?string $day;
    public ?string $time;
    public ?string $timezone;
    public ?string $string;
}
