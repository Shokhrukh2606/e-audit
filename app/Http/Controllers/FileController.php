<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function open(Request $req){
    	if($_GET['path']??false){
	    	$path="app/".urldecode($_GET['path']);
	    	return response()->download(storage_path($path),basename($path), []);
    	}
    	abort(404);
    }
    public function logintest(Request $req){
    	dd($req->all());
    }
}
