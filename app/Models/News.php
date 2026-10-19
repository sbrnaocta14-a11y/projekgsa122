<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'source',
        'date',
        'description',
        'link',
        'show_on_home',
    ];

    protected $casts = [
        'date' => 'date',
        'show_on_home' => 'boolean',
    ];
}