<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone', 'address', 'description', 'avatar', 'portrait'
    ];

    public function getRouteKeyName() {
        return 'username';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Post', 'comments')->withPivot('text');
    }

    public function followers()
    {
        //They are following me, They are followers
        return $this->belongsToMany('App\User', 'followers', 'following_id', 'follower_id');
    }

    public function following()
    {
        //I am a follower, I am following
        return $this->belongsToMany('App\User', 'followers', 'follower_id', 'following_id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Post', 'like_post', 'user_id', 'post_id');
    }

    //GATES
    public function hasAnyRoles($roles) {
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
}
