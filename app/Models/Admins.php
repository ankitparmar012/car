<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admins extends Model
{
    use Notifiable;
    //use AdminHasRol;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','name','password_text'

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token','status'
    ];

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
}
