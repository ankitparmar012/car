<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCard extends Model
{
    protected  $fillable = [ 'fk_id_customer','fk_id_car','total_services_price','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'job_cards';
    protected $primaryKey = 'id_job_card';

    public function CarModel(){
        return $this->belongsTo(CarModels::class, 'fk_id_car', 'id_car_model');
    }

    public function GetSelectedServices(){
        return $this->hasMany(SelectedJobCardServicesList::class, 'fk_id_job_card', 'id_job_card');
    }




}
