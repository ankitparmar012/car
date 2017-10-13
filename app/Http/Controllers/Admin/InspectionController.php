<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModels;
use App\Models\JobCard;
use App\Models\Services;
use App\Models\ServicesCategory;

class InspectionController extends Controller
{
    /*
     * Route : admin.job-card.index
     * URL   : job-card
     * Desc  : Get Job Card  Details */

    public function Index_Inpection()
    {
        $aServicesCategoryList = ServicesCategory::where('status', 'ACTIVE')->get();
        $aServicesList         = Services::where('status', 'ACTIVE')->get();
        $aCars                 = CarModels::where('status', 'ACTIVE')->get();
        $aJobCard              = JobCard::with('CarModel', 'GetSelectedServices')->get();
        //return $aJobCard;
        return view('admin.templates.inspection.inspection', compact('aServicesCategoryList', 'aJobCard', 'aServicesList', 'aCars'));
    }
}
