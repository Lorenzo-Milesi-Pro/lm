<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;

    protected function htmlContent(): Attribute
    {
        $blocks = explode('```', $this->content);

        foreach($blocks as $k => $block) {
            if($k % 2) {
                $language = !empty(Str::before($block, PHP_EOL))
                    ? Str::before($block, PHP_EOL)
                    : 'bash';
                $blocks[$k] = [
                    'language' => $language,
                    'content' => Str::after($block, PHP_EOL)
                ];
            }
        }

        return new Attribute(
            get: fn () => $blocks
        );
    }

}
