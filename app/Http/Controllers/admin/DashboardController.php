<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
class DashboardController extends Controller
{
    public function index(){
    	$totalProduct = Product::get();
    	$totalCustomer = Customer::get();
    	return view('backEnd.admin.dashboard',compact('totalProduct','totalCustomer'));
    }
}
