<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberRole;
use Illuminate\Http\Request;
use Validator;

class MemberRolesController extends Controller
{
    /*
     * Route : admin.member-role.index
     * URL   : member-role
     * Desc  : Get All Member Role Details */
    public function Index_MemberRole()
    {
        $aMemberRole = MemberRole::get();
        return view('admin.templates.member-role.member-role', compact('aMemberRole'));
    }
    /*
     * Route : admin.member-role.index
     * URL   : member-role
     * Desc  : Insert Member RoleDetails */

    public function Insert_MemberRole(Request $oRequest)
    {
        $aRules = array(
            'member_role' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oMemberRole = new MemberRole();
            $slug        = str_replace(" ", "-", $oRequest->member_role);
            $oRequest->offsetSet('slug', $slug);
            $oMemberRoleRes = $oMemberRole->create($oRequest->all());

            if ($oMemberRoleRes) {
                session()->flash('msg', 'Member Role Added');
            } else {
                session()->flash('msg', 'Member Role Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*
     * Route : admin.member-role.get
     * URL   : Member Role
     * Desc  : Single Member Details*/
    public function Edit_MemberRole(Request $oRequest, MemberRole $id)
    {
        $aMemberRole = MemberRole::get();
        return view('admin.templates.member-role.member-role', compact('aMemberRole', 'id'));
    }

    /*
     * Route : admin.member-role.update
     * URL   : Member-Role
     * Desc  : Update Member Role Details */
    public function update_MemberRole(Request $oRequest, MemberRole $id)
    {
        $aRules = array(
            'member_role' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $slug = str_replace(" ", "-", $oRequest->member_role);
            $oRequest->offsetSet('slug', $slug);

            $oResponse = $id->update($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Member Role Has Been Updated');
                return redirect()->route('admin.member-role.index');
            } else {
                session()->flash('msg', 'Member Role Has Been not Updated');
                return redirect()->route('admin.member-role.index');
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
     * URL   : Member-Role
     * Desc  : Delete Member Role Details */
    public function Delete_MemberRole(MemberRole $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Member Role Deleted');
        } else {
            session()->flash('msg', 'Member Role Not Deleted');
        }

        return redirect()->route('admin.member-role.index');
    }

    /*
     * Route : admin.member-role.change_status
     * URL   : Member-Role
     * Desc  : Change Status*/
    public function UpdateStatus_MemberRole(Request $oRequest)
    {
        $oResponse = MemberRole::where('id_member_roles', $oRequest->id)->update([
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
