<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'posts';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }


    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }


}
