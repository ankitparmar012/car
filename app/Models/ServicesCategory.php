<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    protected  $fillable = [ 'ser_cat_title','ser_cat_desc','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'services_categories';
    protected $primaryKey = 'id_services_category';
}
