<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{

    /*Start :: Open Dashboard Home Page*/
    public function DashboardIndex()
    {
        return view('admin.templates.dashboard.dashboard');
    }

    public function Redirect()
    {
        if (Auth::check()) {
            return redirect(route('admin.dashboard.index'));
        } else {
            return redirect(route('login'));
        }
    }

}
