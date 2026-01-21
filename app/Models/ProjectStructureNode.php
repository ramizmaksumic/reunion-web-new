<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStructureNode extends Model
{
    protected $fillable = [
        'project_id',
        'parent_id',
        'type',
        'name',
        'description',
        'is_public',
        'order',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }
}
