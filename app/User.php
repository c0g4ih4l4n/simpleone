<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Presenters\UserPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;

class User extends Authenticatable implements HasPresenter
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $timestamp = true;

    public function avatars() 
    {
        return $this->morphMany('App\Models\Photo', 'photo');
    }

    public function getPresenterClass()
    {
        return UserPresenter::class;
    }
}
