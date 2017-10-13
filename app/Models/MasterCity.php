<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterCity extends Model
{
    protected  $fillable = [ 'name','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'master_cities';
    protected $primaryKey = 'id_master_city';
}
