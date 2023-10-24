<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Weight extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'weights';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function coffees()
    {
        return $this->hasMany(Coffee::class);
    }
}
