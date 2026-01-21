<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\String\b;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts()
    {

        return $this->belongsToMany(Post::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
