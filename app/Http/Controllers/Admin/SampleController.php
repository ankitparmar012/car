<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function Index()
    {
        return view('admin.templates.sample_from.sample_from');
    }
}
