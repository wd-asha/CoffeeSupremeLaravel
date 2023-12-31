<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';
    protected $guarded = [];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
