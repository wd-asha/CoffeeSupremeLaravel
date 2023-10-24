<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subscriber;
use App\Models\Role;
/*use Illuminate\Contracts\Auth\CanResetPassword;*/
/*use Illuminate\Auth\Passwords\canResetPassword as ResetPassword;*/

class User extends Authenticatable /*implements CanResetPassword*/
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /*use ResetPassword;*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subscriber()
    {
        return $this->hasOne(Subscriber::class);
    }

}
