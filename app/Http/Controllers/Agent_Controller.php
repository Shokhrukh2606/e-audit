<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Agent_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:agent');
    }
    private function view($file, $data = [])
    {
        return view('Agent.'.$file, $data);
    }
    public function list_conclusions(){
    	return $this->view('list_conclusions');
    }
    public function create_conclusion(){
    	return $this->view('create_conclusion');
    }
    public function pay_for_conclusion()
    {
        return $this->view('pay_for_conclusion');
    }
    public function view_conclusion_protected()
    {
        return $this->view('view_conclusion_protected');
    }
    public function view_conclusion_open()
    {
        return $this->view('view_conclusion_protected');
    }
    public function cashback_log()
    {
        return $this->view('cashback_log');
    }
    public function transactions_log()
    {
        return $this->view('transactions_log');
    }
    public function payment_log()
    {
        return $this->view('payment_log');
    }
}
