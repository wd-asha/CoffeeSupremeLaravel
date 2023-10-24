<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Coffee extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'coffees';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'coffee_slug' => [
                'source' => 'coffee_title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function grind()
    {
        return $this->belongsTo(Grind::class);
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
