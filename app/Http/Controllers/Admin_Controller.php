<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:admin');
    }
}
