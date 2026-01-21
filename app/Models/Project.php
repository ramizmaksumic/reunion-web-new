<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\String\b;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'is_featured',
        'sort_order',
        'status',
        'link'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function documentations()
    {
        return $this->hasMany(ProjectDocumentation::class);
    }

    public function structureNodes()
    {
        return $this->hasMany(ProjectStructureNode::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }



    protected static function booted()
    {
        static::deleting(function ($project) {

            // obriši cover sliku
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            // obriši gallery slike
            foreach ($project->images as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
            }

            // (opcionalno) obriši cijeli folder projekta
            Storage::disk('public')->deleteDirectory('projects/' . $project->id);
        });
    }
}
