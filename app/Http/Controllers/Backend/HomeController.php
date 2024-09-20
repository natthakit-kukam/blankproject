<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         return view('back-end.admin.index');
    }
    // public function dashbord()
    // { 
    //      return view('back-end.admin.dashbord');
    // }
}
