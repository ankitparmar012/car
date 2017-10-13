<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SelectedJobCardServicesList extends Model
{
    protected  $fillable = [ 'fk_id_job_card','fk_id_job_card_services','services_name','services_price'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'selected_job_card_services_lists';
    protected $primaryKey = 'id_selected_job_card';
}
