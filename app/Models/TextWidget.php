<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'image',
        'title',
        'content',
        'active'
    ];

    public static function getTitle(string $key): string
    {
        $widget = Cache::get('text-widget-' . $key, function () use ($key) {
            return TextWidget::query()->where('key', $key)->where('active', '=', 1)->first();
        });
        // dd($widget->title);

        if ($widget) {
            return $widget->title;
        }

        return '';

        // $widget = TextWidget::query()->where('key', $key)->first();

        // if (!$widget) {
        //     return '';
        // }

        // return $widget->title;
    }

    public static function getContent(string $key): string
    {
        $widget = Cache::get('text-widget-' . $key, function () use ($key) {
            return TextWidget::query()->where('key', $key)->where('active', '=', 1)->first();
        });

        if ($widget) {
            return $widget->content;
        }

        return '';
    }
    //     $widget = Cache::get('text-widget-' . $key, function () use ($key) {
    //         return TextWidget::query()->where('key', $key)->first();
    //     });

    //     if (!$widget) {
    //         return '';
    //     }

    //     return $widget->content;
    // }
}
