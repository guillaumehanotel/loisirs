<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class AiredDatesDto extends DataTransferObject
{
    public DateDto $from;
    public DateDto $to;
}
