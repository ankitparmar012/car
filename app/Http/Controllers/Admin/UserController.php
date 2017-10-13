<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /*Start ::user Functionality */
    public function Index()
    {
        $aUser = User::get();
        return view('admin.templates.user.user', compact('aUser'));
    }

    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6',
            'user_type' => 'required',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = User::create([
                'name'          => $oRequest['name'],
                'email'         => $oRequest['email'],
                'designation'   => $oRequest['designation'],
                'password_text' => $oRequest['password'],
                'user_type'     => $oRequest['user_type'],
                'mobile_no'     => $oRequest['mobile_no'],
                'password'      => bcrypt($oRequest['password']),
            ]);

            if ($oResponse) {
                session()->flash('msg', 'User Added');
            } else {
                session()->flash('msg', 'User Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::user insert*/

    /*Start:: Get user*/
    public function GetUser(User $id)
    {
        $aUser = User::all();
        return view('admin.templates.user.user', compact('id', 'aUser'));
    }
    /*End:: Get user*/

    /*Start :: Update Single Laundry User*/
    public function Update(Request $oRequest, User $id)
    {
        $aRules = array(
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $aUser = $id->update([
                'name'      => $oRequest['name'],
                'email'     => $oRequest['email'],
                'user_type' => $oRequest['user_type'],
                'mobile_no' => $oRequest['mobile_no'],
            ]);
            if ($aUser) {
                session()->flash('msg', 'User Has Been Updated');
                return redirect()->route('admin.user.index');
            } else {
                session()->flash('msg', 'User Has Been Updated');
                return redirect()->route('admin.user.index');
            }

        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
    }

    /*Start:: Delete user */
    public function Delete(User $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'User Deleted');
        } else {
            session()->flash('msg', 'User Not Deleted');
        }

        return redirect()->route('admin.user.index');

    }
    /*End:: Delete user*/

    /*Start::Update status user*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = User::where('id', $oRequest->id)->update([
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
    /*End::Update status user*/
}
