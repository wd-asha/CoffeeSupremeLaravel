<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'categories';
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

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

}
