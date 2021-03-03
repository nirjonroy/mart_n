<?php


	 function customer()
	 {
    	$data = DB::table('customers')->get();
    	return $data;
   	 }
