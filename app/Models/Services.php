<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected  $fillable = [ 'fk_id_services_category','ser_title','ser_cat_desc','ser_price','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'services';
    protected $primaryKey = 'id_services';

    public function ServicesCategory(){
        return $this->belongsTo(ServicesCategory::class, 'fk_id_services_category', 'id_services_category');
    }

}
