<?php

namespace App\DataTransferObjects\Anime;

use Spatie\DataTransferObject\DataTransferObject;

class DateDto extends DataTransferObject
{
    public ?int $day;
    public ?int $month;
    public ?int $year;
}
