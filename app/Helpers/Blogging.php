<?php

namespace App\Helpers;

class Blogging
{
    public static function estimateReadingTime(string $text): object
    {
        $count = str_word_count(strip_tags($text));
        $minutes = floor($count / 200);
        $seconds = floor($count % 200 / (200 / 60));

        return new class($minutes, $seconds)
        {
            public function __construct(
                public readonly int $minutes,
                public readonly int $seconds,
            ) {
            }
        };
    }
}
