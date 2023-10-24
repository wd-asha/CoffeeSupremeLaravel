<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Equipment extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'equipments';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'equipment_slug' => [
                'source' => 'equipment_title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function firma()
    {
        return $this->belongsTo(Firma::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
