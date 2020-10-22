<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Agent_Controller extends Controller
{
    function __construct($foo = null)
    {
    	$this->middleware('multi_auth:agent,auditor,customer');
    }
    public function hello(){
    	print_r("hello");
    }
}
