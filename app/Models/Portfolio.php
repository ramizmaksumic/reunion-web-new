<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'image', 'slug', 'tag', 'status', 'category_id', 'description', 'link'];

    protected $casts = [
        'tag' => 'array',
    ];
}
