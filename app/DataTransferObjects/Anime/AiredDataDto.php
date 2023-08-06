<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class AiredDataDto extends DataTransferObject
{
    public string $from;
    public ?string $to;
    public AiredDatesDto $prop;
    public string $string;
}
