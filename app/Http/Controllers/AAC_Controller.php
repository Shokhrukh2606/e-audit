<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AAC_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:agent,auditor,customer');
    }
}
