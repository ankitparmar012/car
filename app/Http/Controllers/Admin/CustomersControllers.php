<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Validator;

class CustomersControllers extends Controller
{
    /* Route : admin.Customer.index
     * URL   : Customer-city
     * Desc  : Get All Master City Details */

    public function Index()
    {
        /*$aCarModel = CarModels::with('Manufacture')->get();
        $aManfacturer = Manufacturer::where('status','ACTIVE')->get();*/
        $aCustomer = Customer::get();
        return view('admin.templates.customers.customers', compact('aCustomer'));
    }
    /*
     * Route : admin.customer.insert
     * URL   : customer
     * Desc  : Insert customer Details Details */
    public function Insert_Customer(Request $oRequest)
    {
        $aRules = array(
            'customer_name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oCustomer    = new Customer();
            $oCustomerRes = $oCustomer->create($oRequest->all());
            if ($oCustomerRes) {
                session()->flash('msg', 'Customer Details Added');
            } else {
                session()->flash('msg', 'Customer DEtails Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.Customer.get
     * URL   : Customer
     * Desc  : Get Customer Details */
    public function Edit_Customer(Request $oRequest, Customer $id)
    {
        $aCustomer = Customer::get();
        return view('admin.templates.customers.customers', compact('aCustomer', 'id'));
    }

    /*
     * Route : admin.Customer.update
     * URL   : Customer
     * Desc  : Change Customer Details */
    public function update_Customer(Request $oRequest, Customer $id)
    {
        $aRules = array(
            'customer_name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Customer Details Has Been Updated');
                return redirect()->route('admin.customer.index');
            } else {
                session()->flash('msg', 'Customer Details Has Been not Updated');
                return redirect()->route('admin.customer.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*
     * Route : admin.customer.delete
     * URL   : customer
     * Desc  : Delete customer Details */
    public function Delete_Customer(Customer $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Customer Details Deleted');
        } else {
            session()->flash('msg', 'Customer Details  Not Deleted');
        }
        return redirect()->route('admin.customer.index');
    }
}
