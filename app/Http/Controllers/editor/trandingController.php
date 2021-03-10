<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class trandingController extends Controller
{
    public function index(){
    	return view('backEnd.category.add_tranding');
    }
}
