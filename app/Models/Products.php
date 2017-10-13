<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected  $fillable = [ 'fk_id_product_category','pro_title','pro_cat_desc','pro_price','pro_qty','slug','status'];
    protected $hidden = ['created_at','update_at'];
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    public function ProductsCategory(){
        return $this->belongsTo(ProductCategory::class, 'fk_id_product_category', 'id_product_category');
    }

}
