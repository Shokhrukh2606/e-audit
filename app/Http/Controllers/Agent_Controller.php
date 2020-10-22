<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Agent_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:agent');
    }
    public function hello(){
    	print_r("hello");
    }
}
