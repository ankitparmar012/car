<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModels;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Validator;

class CarModelsController extends Controller
{
    /*
     * Route : admin.master-city.index
     * URL   : master-city
     * Desc  : Get All Master City Details */

    public function Index_CarModel()
    {
        $aCarModel    = CarModels::with('Manufacture')->get();
        $aManfacturer = Manufacturer::where('status', 'ACTIVE')->get();
        return view('admin.templates.car_model.car_model', compact('aManfacturer', 'aCarModel'));
    }
    /*
     * Route : admin.master-city.insert
     * URL   : master-city
     * Desc  : Insert Master City Details */

    public function Insert_CarModel(Request $oRequest)
    {
        $aRules = array(
            'model_name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oCity = new CarModels();
            $slug  = str_replace(" ", "-", $oRequest->model_name);
            $oRequest->offsetSet('slug', $slug);
            $oCityRes = $oCity->create($oRequest->all());

            if ($oCityRes) {
                session()->flash('msg', 'Car Model City Added');
            } else {
                session()->flash('msg', 'Car Model Not Added');
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
    public function Edit_CarModel(Request $oRequest, CarModels $id)
    {
        $aCarModel    = CarModels::with('Manufacture')->get();
        $aManfacturer = Manufacturer::where('status', 'ACTIVE')->get();
        return view('admin.templates.car_model.car_model', compact('aManfacturer', 'aCarModel', 'id'));
    }
    /* Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function update_CarModel(Request $oRequest, CarModels $id)
    {
        $aRules = array(
            'model_name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->model_name);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Car Model Has Been Updated');
                return redirect()->route('admin.car-model.index');
            } else {
                session()->flash('msg', 'Car Model Has Been not Updated');
                return redirect()->route('admin.car-model.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.manufacturer.delete
     * URL   : Manufacturer
     * Desc  : Delete Manufacturer Details */
    public function Delete_CarModel(CarModels $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Car Model Deleted');
        } else {
            session()->flash('msg', 'Car Model  Not Deleted');
        }
        return redirect()->route('admin.car-model.index');
    }

    /*
     * Route : admin.products-category.change_status
     * URL   : products-category.
     * Desc  : Insert Products Category Details */
    public function UpdateStatus_CarModel(Request $oRequest)
    {

        $oResponse = CarModels::where('id_car_model', $oRequest->id)->update([
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
