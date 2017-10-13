<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRole extends Model
{
    protected  $fillable = [ 'member_role','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'member_roles';
    protected $primaryKey = 'id_member_roles';
}
