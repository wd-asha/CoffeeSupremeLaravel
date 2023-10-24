<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'teams';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'team_slug' => [
                'source' => 'team_title'
            ]
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }
}
