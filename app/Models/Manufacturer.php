<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected  $fillable = [ 'manufacturer_by','img','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'manufacturers';
    protected $primaryKey = 'id_manufacturer';
}
