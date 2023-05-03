<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboardAdmin',
        [
            'title' => 'Dashboard Admin'
        ]);
    }
}
