<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'rubrics';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'rubric_slug' => [
                'source' => 'rubric_title'
            ]
        ];
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
