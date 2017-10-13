<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Validator;

class ServicesCategoryController extends Controller
{
    /*
     * Route : admin.Services-category.index
     * URL   : products-category
     * Desc  : Get All Products Category Details */

    public function Index_ServicesCategory()
    {
        $aSerCate = ServicesCategory::get();
        return view('admin.templates.services-category.services-category', compact('aSerCate'));
    }
    /*
     * Route : admin.services-category.insert
     * URL   : services-category
     * Desc  : Insert Services Category Details */

    public function Insert_ServicesCategory(Request $oRequest)
    {
        $aRules = array(
            'ser_cat_title' => 'required',
            'ser_cat_desc'  => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oSerCat = new ServicesCategory();
            $slug    = str_replace(" ", "-", $oRequest->ser_cat_title);
            $oRequest->offsetSet('slug', $slug);
            $oSerCateRes = $oSerCat->create($oRequest->all());

            if ($oSerCateRes) {
                session()->flash('msg', 'Services Category Added');
            } else {
                session()->flash('msg', 'Services Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.Services-category.get
     * URL   : Services-category
     * Desc  : Get Services Category Details */
    public function Edit_ServicesCategory(Request $oRequest, ServicesCategory $id)
    {
        $aSerCate = ServicesCategory::get();
        return view('admin.templates.services-category.services-category', compact('aSerCate', 'id'));
    }
    /*
     * Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function update_ServicesCategory(Request $oRequest, ServicesCategory $id)
    {
        $aRules = array(
            'ser_cat_title' => 'required',
            'ser_cat_desc'  => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->ser_cat_title);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Services Category Has Been Updated');
                return redirect()->route('admin.services-category.index');
            } else {
                session()->flash('msg', 'Services Category Has Been not Updated');
                return redirect()->route('admin.services-category.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.Services-category.delete
     * URL   : Services-category
     * Desc  : Delete Services Category Details */
    public function Delete_ServicesCategory(ServicesCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Services Category Deleted');
        } else {
            session()->flash('msg', 'Services Category  Not Deleted');
        }
        return redirect()->route('admin.services-category.index');
    }
    /*
     * Route : admin.products-category.change_status
     * URL   : products-category.
     * Desc  : Insert Products Category Details */
    public function UpdateStatus_ServicesCategory(Request $oRequest)
    {

        $oResponse = ServicesCategory::where('id_services_category', $oRequest->id)->update([
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
