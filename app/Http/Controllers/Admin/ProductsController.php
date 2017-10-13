<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;

class ProductsController extends Controller
{
    /*
     * Route : admin.products.index
     * URL   : products-category
     * Desc  : Get All Products Category Details */

    public function Index_Products()
    {
        $aProCate = ProductCategory::where('status', 'ACTIVE')->get();

        $aProducts = Products::with('ProductsCategory')->get();
        return view('admin.templates.products.products', compact('aProCate', 'aProducts'));
    }
    /*
     * Route : admin.products.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */

    public function Insert_Product(Request $oRequest)
    {
        $aRules = array(
            'fk_id_product_category' => 'required',
            'pro_title'              => 'required',
            'pro_cat_desc'           => 'required',
            'pro_price'              => 'required',
            'pro_qty'                => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProduct = new Products();
            $slug     = str_replace(" ", "-", $oRequest->pro_title);
            $oRequest->offsetSet('slug', $slug);
            $oProCateRes = $oProduct->create($oRequest->all());

            if ($oProCateRes) {
                session()->flash('msg', 'Product Added');
            } else {
                session()->flash('msg', 'Products Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.products.get
     * URL   : products
     * Desc  : Change Products Category Details */
    public function Edit_Products(Request $oRequest, Products $id)
    {
        $aProCate  = ProductCategory::get();
        $aProducts = Products::with('ProductsCategory')->get();
        return view('admin.templates.products.products', compact('aProCate', 'aProducts', 'id'));
    }

    /*
     * Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function update_Products(Request $oRequest, Products $id)
    {
        $aRules = array(
            'fk_id_product_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->pro_title);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Product Has Been Updated');
                return redirect()->route('admin.products.index');
            } else {
                session()->flash('msg', 'Product Has Been not Updated');
                return redirect()->route('admin.products.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.products.delete
     * URL   : product
     * Desc  : Delete Product Details */
    public function Delete_Products(Products $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Product Deleted');
        } else {
            session()->flash('msg', 'Product  Not Deleted');
        }
        return redirect()->route('admin.products.index');
    }
    /*
     * Route : admin.products-category.change_status
     * URL   : products-category.
     * Desc  : Insert Products Category Details */
    public function UpdateStatus_Products(Request $oRequest)
    {

        $oResponse = Products::where('id_product', $oRequest->id)->update([
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
