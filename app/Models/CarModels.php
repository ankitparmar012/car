<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModels extends Model
{
    protected  $fillable = [ 'fk_id_manufacturer','model_name','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'car_models';
    protected $primaryKey = 'id_car_model';

    public function Manufacture(){
        return $this->belongsTo(Manufacturer::class, 'fk_id_manufacturer', 'id_manufacturer');
    }

}
