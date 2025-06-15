<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $loginCount = Login::count();

        return view('welcome', compact('userCount', 'loginCount'));
    }
}
