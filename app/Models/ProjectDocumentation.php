<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDocumentation extends Model
{
    protected $fillable = ['title', 'project_id', 'introduction', 'is_public'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
