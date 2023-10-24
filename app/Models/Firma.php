<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Firma extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'firmas';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
