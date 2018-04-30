<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    Public static function getCustomers(){
        return DB::table('customers')->get();
    }

    Public static function addCustomer($request){
        return DB::table('customers')->insert(
            ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'phone' => $request->phnno]
        );
    }

    Public static function editCustomer($customerid){
        return DB::table('customers')->where('id', $customerid)->first();
    }

    Public static function updateCustomer($request){
        return DB::table('customers')->where('id', $request->custid)->update(
            ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'phone' => $request->phnno]
        );
    }

    Public static function deleteCustomer($customerid){
        return DB::table('customers')->where('id', $customerid)->delete();
    }
}
