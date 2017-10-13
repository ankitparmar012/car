<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCity;
use Illuminate\Http\Request;
use Validator;

class MasterCityController extends Controller
{
    /*
     * Route : admin.master-city.index
     * URL   : master-city
     * Desc  : Get All Master City Details */

    public function Index_MasterCity()
    {
        $aCity = MasterCity::get();
        return view('admin.templates.master-city.master-city', compact('aCity'));
    }

    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */

    public function Insert_MasterCity(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oCity = new MasterCity();
            $slug  = str_replace(" ", "-", $oRequest->name);
            $oRequest->offsetSet('slug', $slug);
            $oCityRes = $oCity->create($oRequest->all());

            if ($oCityRes) {
                session()->flash('msg', 'Master City Added');
            } else {
                session()->flash('msg', 'Master City Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.master-city.edit
     * URL   : master-city
     * Desc  : Change Master City Details */
    public function Edit_MasterCity(Request $oRequest, MasterCity $id)
    {
        $aCity = MasterCity::get();
        return view('admin.templates.master-city.master-city', compact('aCity', 'id', 'aCity'));
    }

    /*
     * Route : admin.master-city.update
     * URL   : master-city
     * Desc  : Change Master City Details */
    public function update_MasterCity(Request $oRequest, MasterCity $id)
    {
        $aRules = array(
            'name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->name);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'City Has Been Updated');
                return redirect()->route('admin.master-city.index');
            } else {
                session()->flash('msg', 'City Has Been not Updated');
                return redirect()->route('admin.master-city.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */
    public function Delete_MasterCity(MasterCity $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Master City Deleted');
        } else {
            session()->flash('msg', 'Master City Not Deleted');
        }

        return redirect()->route('admin.master-city.index');
    }

    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */
    public function UpdateStatus_MasterCity(Request $oRequest)
    {

        $oResponse = MasterCity::where('id_master_city', $oRequest->id)->update([
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
