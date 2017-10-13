<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Validator;

class ProductsCategoryController extends Controller
{
    /*
     * Route : admin.products-category.index
     * URL   : products-category
     * Desc  : Get All Products Category Details */

    public function Index_ProductsCategory()
    {
        $aProCate = ProductCategory::get();
        return view('admin.templates.products-category.products-category', compact('aProCate'));
    }
    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */

    public function Insert_ProductsCategory(Request $oRequest)
    {
        $aRules = array(
            'pro_cat_title' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProCat = new ProductCategory();
            $slug    = str_replace(" ", "-", $oRequest->pro_cat_title);
            $oRequest->offsetSet('slug', $slug);
            $oProCateRes = $oProCat->create($oRequest->all());

            if ($oProCateRes) {
                session()->flash('msg', 'Product Category Added');
            } else {
                session()->flash('msg', 'Products Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.products-category.get
     * URL   : products-category
     * Desc  : Change Products Category Details */
    public function Edit_ProductsCategory(Request $oRequest, ProductCategory $id)
    {
        $aProCate = ProductCategory::get();
        return view('admin.templates.products-category.products-category', compact('aProCate', 'id'));
    }
    /*
     * Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function update_ProductsCategory(Request $oRequest, ProductCategory $id)
    {
        $aRules = array(
            'pro_cat_title' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->pro_cat_title);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Product Category Has Been Updated');
                return redirect()->route('admin.products-category.index');
            } else {
                session()->flash('msg', 'Product Category Has Been not Updated');
                return redirect()->route('admin.products-category.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.product-category.insert
     * URL   : product-category
     * Desc  : Insert Master City Details */
    public function Delete_ProductsCategory(ProductCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Product Category Deleted');
        } else {
            session()->flash('msg', 'Product Category  Not Deleted');
        }
        return redirect()->route('admin.products-category.index');
    }

    /*
     * Route : admin.products-category.change_status
     * URL   : products-category.
     * Desc  : Insert Products Category Details */
    public function UpdateStatus_ProductsCategory(Request $oRequest)
    {

        $oResponse = ProductCategory::where('id_product_category', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        if ($oResponse) {
            session()->flash('msg', 'Status Changed');
            return response()->json(array('data' => $oResponse, 'status' => 1));
        } else {
            $oResponse = 'not found';
            session()->flash('msg', 'Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }

    }

}
