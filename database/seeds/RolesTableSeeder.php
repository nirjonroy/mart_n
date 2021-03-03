<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            'user_role'=>'Super admin'
        ]);
     
        DB::table('roles')->insert([
            'user_role'=>'Admin'
        ]);
         
        DB::table('roles')->insert([
            'user_role'=>'Editor'
        ]);
                 
        DB::table('roles')->insert([
            'user_role'=>'Author'
        ]);
    }
}
