<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /* app/User.php */

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }


    protected $fillable = [
        'name', 'email', 'password', 'phone', 'location','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function interested(){
        return $this->hasMany('App\Interested');
    }

    public function activities(){
        return $this->hasMany('App\UserActivity');
    }


}
