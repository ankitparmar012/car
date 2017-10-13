<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected  $fillable = [ 'pro_cat_title','pro_cat_desc','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'product_categories';
    protected $primaryKey = 'id_product_category';
}
