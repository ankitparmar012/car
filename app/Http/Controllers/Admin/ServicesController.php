<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Validator;

class ServicesController extends Controller
{
    /*
     * Route : admin.services.index
     * URL   : products-category
     * Desc  : Get All Products Category Details */

    public function Index_Services()
    {
        $aServices = Services::with('ServicesCategory')->get();
        $aSerCat   = ServicesCategory::where('status', 'ACTIVE')->get();
        return view('admin.templates.services.services', compact('aSerCat', 'aServices'));
    }
    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */

    public function Insert_Services(Request $oRequest)
    {
        $aRules = array(
            'ser_title' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProCat = new Services();
            $slug    = str_replace(" ", "-", $oRequest->ser_title);
            $oRequest->offsetSet('slug', $slug);
            $oProCateRes = $oProCat->create($oRequest->all());

            if ($oProCateRes) {
                session()->flash('msg', 'Services Added');
            } else {
                session()->flash('msg', 'Services Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.services.get
     * URL   : services
     * Desc  :  */
    public function Edit_services(Request $oRequest, Services $id)
    {
        $aServices = Services::with('ServicesCategory')->get();
        $aSerCat   = ServicesCategory::where('status', 'ACTIVE')->get();
        return view('admin.templates.services.services', compact('aSerCat', 'aServices', 'id'));
    }
    /*
     * Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function update_Services(Request $oRequest, Services $id)
    {
        $aRules = array(
            'fk_id_services_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->ser_title);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Services Has Been Updated');
                return redirect()->route('admin.services.index');
            } else {
                session()->flash('msg', 'Services Has Been not Updated');
                return redirect()->route('admin.services.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.services.delete
     * URL   : product
     * Desc  : Delete Product Details */
    public function Delete_Services(Services $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Services Deleted');
        } else {
            session()->flash('msg', 'Services  Not Deleted');
        }
        return redirect()->route('admin.services.index');
    }
    /*
     * Route : admin.products-category.change_status
     * URL   : products-category.
     * Desc  : Insert Products Category Details */
    public function UpdateStatus_Services(Request $oRequest)
    {
        $oResponse = Services::where('id_services', $oRequest->id)->update([
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
