<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'user_name', 'e_mail', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks(){
        return $this->hasMany('App\Task','user_id');
    }
}
