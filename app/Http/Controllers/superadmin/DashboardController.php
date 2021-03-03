<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\User;
use App\Seller;
class DashboardController extends Controller
{
  public function index(){
  	$customers = Customer::get();
  	$users = User::get();
  	$sellers = Seller::get();
    	return view('backEnd.superadmin.dashboard',compact('customers','users','sellers'));
    }
}
