<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModels;
use App\Models\Customer;
use App\Models\JobCard;
use App\Models\SelectedJobCardServicesList;
use App\Models\Services;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Validator;

class JobCardController extends Controller
{
    /*
     * Route : admin.job-card.index
     * URL   : job-card
     * Desc  : Get Job Card  Details */

    public function Index_JobCard()
    {

        $aServicesCategoryList = ServicesCategory::where('status', 'ACTIVE')->get();
        $aServicesList         = Services::where('status', 'ACTIVE')->get();
        $aCars                 = CarModels::where('status', 'ACTIVE')->get();
        $aCustomer             = Customer::get();
        $aJobCard              = JobCard::with('CarModel', 'GetSelectedServices')->get();

        return view('admin.templates.job-card.job-card', compact('aCustomer', 'aServicesCategoryList', 'aJobCard', 'aServicesList', 'aCars'));
    }
    /*
     * Route : admin.job-card.index
     * URL   : job-card
     * Desc  : Get Job Card  Details */

    public function Get_AjexServices(Request $oRequest)
    {
        $Sid       = $oRequest->id;
        $oServices = Services::find($Sid);
        return response()->json(['data' => $oServices, 'status' => '1']);
    }

    /*
     * Route : admin.job-card.insert
     * URL   : job-card
     * Desc  : Insert job-card Details */

    public function Insert_JobCard(Request $oRequest)
    {
        // dd($oRequest->fk_id_job_card_services);

        $aRules = array(
            'fk_id_customer'          => 'required',
            'fk_id_car'               => 'required',
            'fk_id_job_card_services' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oJobCard    = new JobCard();
            $oJobCardRes = $oJobCard->create($oRequest->all());
            for ($i = 0; $i < count($oRequest->fk_id_job_card_services); $i++) {
                $oSelectedServicesAdded                            = new SelectedJobCardServicesList();
                $oSelectedServicesAdded['fk_id_job_card']          = $oJobCardRes->id_job_card;
                $oSelectedServicesAdded['fk_id_job_card_services'] = $oRequest->fk_id_job_card_services[$i];
                $oResponse                                         = $oSelectedServicesAdded->save();
            }

            if ($oJobCardRes) {
                session()->flash('msg', 'Job Card Details Added');
            } else {
                session()->flash('msg', 'Job Card Details Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.products-category.update
     * URL   : Products Category
     * Desc  : Change Products Category Details */
    public function Update_JobCard(Request $oRequest, JobCard $id)
    {
        //dd($oRequest->old_fk_id_job_card_services);
        $aRules = array(
            'fk_id_customer'          => 'required',
            'fk_id_car'               => 'required',
            'fk_id_job_card_services' => 'required',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oResponse                    = $id->update($oRequest->all());
            $oSelectedJobCardServicesList = SelectedJobCardServicesList::where('fk_id_job_card', '=', $id->id_job_card)->delete();
            for ($i = 0; $i < count($oRequest->fk_id_job_card_services); $i++) {
                $oSelectedServicesAdded                            = new SelectedJobCardServicesList();
                $oSelectedServicesAdded['fk_id_job_card']          = $id->id_job_card;
                $oSelectedServicesAdded['fk_id_job_card_services'] = $oRequest->fk_id_job_card_services[$i];
                $oResponse                                         = $oSelectedServicesAdded->save();
            }
            if ($oResponse) {
                session()->flash('msg', 'Job Card Details Updated');
                return redirect()->route('admin.job-card.index');
            } else {
                session()->flash('msg', 'Job Card Details Updated');
                return redirect()->route('admin.job-card.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.job-card.get
     * URL   : job-card
     * Desc  :  */
    public function Edit_JobCard(Request $oRequest, JobCard $id)
    {
        $aServicesCategoryList        = ServicesCategory::where('status', 'ACTIVE')->get();
        $aSelectedJobCardServicesList = SelectedJobCardServicesList::where('fk_id_job_card', $id->id_job_card)->get();
        $aServicesList                = Services::where('status', 'ACTIVE')->get();
        $aCars                        = CarModels::where('status', 'ACTIVE')->get();
        $aJobCard                     = JobCard::with('CarModel', 'GetSelectedServices')->get();
        $aCustomer                    = Customer::get();
        foreach ($aSelectedJobCardServicesList as $val) {
            $aSelectedServices[] = $val["fk_id_job_card_services"];
        }
        return view('admin.templates.job-card.job-card', compact('aCustomer', 'aSelectedServices', 'aServicesCategoryList', 'id', 'aCars', 'aJobCard', 'aServicesList', 'aSelectedJobCardServicesList'));
    }

}
