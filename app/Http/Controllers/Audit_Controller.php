<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Audit_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:auditor');
    }
}
