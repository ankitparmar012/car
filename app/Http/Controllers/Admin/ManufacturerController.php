<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Validator;

class ManufacturerController extends Controller
{
    /*
     * Route : admin.manufacturer.index
     * URL   : products-category
     * Desc  : Get All Products Category Details */

    public function Index_Manufacture()
    {
        //$aProCate = ProductCategory::where('status','ACTIVE')->get();
        $aManufacturer = Manufacturer::get();
        return view('admin.templates.manufacturer.manufacturer', compact('aManufacturer'));
    }
    /*
     * Route : admin.services-category.insert
     * URL   : services-category
     * Desc  : Insert Services Category Details */

    public function Insert_Manufacture(Request $oRequest)
    {
        $aRules = array(
            'manufacturer_by' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            if (!empty($oRequest->manufacturer_image)) {
                $upload_file = $this->uploadManufactureImage($oRequest);
                $oRequest->offsetSet('img', $upload_file);
            }
            $oManufacturer = new Manufacturer();
            $slug          = str_replace(" ", "-", $oRequest->manufacturer_by);
            $oRequest->offsetSet('slug', $slug);
            $oManufacturerRes = $oManufacturer->create($oRequest->all());

            if ($oManufacturerRes) {
                session()->flash('msg', 'Manufacturer Details Added');
            } else {
                session()->flash('msg', 'Manufacturer Details Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    private function uploadManufactureImage(Request $oRequest)
    {
        $oUploadedImage   = $oRequest->file('manufacturer_image');
        $sDestinationPath = public_path() . config('constants.MANUFACTURER_IMAGE'); // upload path
        $sExtension       = $oUploadedImage->getClientOriginalExtension(); // getting image extension
        $sFileName        = str_random(8) . '_' . time() . '.' . $sExtension; // renameing image
        $is_uploded       = $oUploadedImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if ($is_uploded) {
            return $sFileName;
        } else {
            return '';
        }
    }
    /*
     * Route : admin.manufacturer.get
     * URL   : manufacturer
     * Desc  : Change Products Category Details */
    public function Edit_Manufacture(Request $oRequest, Manufacturer $id)
    {
        $aManufacturer = Manufacturer::get();
        return view('admin.templates.manufacturer.manufacturer', compact('aManufacturer', 'id'));
    }

    /*
     * Route : admin.manifacturer.update
     * URL   : manifacturer
     * Desc  : Change manifacturer Details */
    public function update_Manufacture(Request $oRequest, Manufacturer $id)
    {
        $aRules = array(
            'manufacturer_by' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            if (!empty($oRequest->manufacturer_image)) {
                unlink(public_path(config('constants.MANUFACTURER_IMAGE') . $id->img));
                $upload_file = $this->uploadManufactureImage($oRequest);
                $oRequest->offsetSet('img', $upload_file);
            }
            $slug = str_replace(" ", "-", $oRequest->manufacturer_by);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Manufacturer Has Been Updated');
                return redirect()->route('admin.manufacturer.index');
            } else {
                session()->flash('msg', 'Manufacturer Has Been not Updated');
                return redirect()->route('admin.manufacturer.index');
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
     * URL   : manufaturer
     * Desc  : Delete Product Details */
    public function Delete_Manufacturer(Manufacturer $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Manufacturer Deleted');
        } else {
            session()->flash('msg', 'Manufacturer  Not Deleted');
        }
        return redirect()->route('admin.manufacturer.index');
    }
    /*
     * Route : admin.manufacturer.change_status
     * URL   : manufacturer-category.
     * Desc  : Status manufacturer Details */
    public function UpdateStatus_Manufacturer(Request $oRequest)
    {
        $oResponse = Manufacturer::where('id_manufacturer', $oRequest->id)->update([
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
