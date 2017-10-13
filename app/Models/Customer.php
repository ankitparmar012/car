<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected  $fillable = ['customer_name','customer_email','phone_no','mobile_no','city','area','p_code'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
}
