<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\customers;
use Illuminate\Support\Facades\Redirect;

class customersController extends Controller
{
    Public function index(){
        $customers = customers::getCustomers();

        return View::make('customers')->with(['customers' => $customers]);
    }

    Public function add(Request $request){
        $validatedData = $this->validate($request, [
            'firstname' => 'required|min:5',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'phnno' => 'required|numeric'
        ], [
            'firstname.required' => 'Please enter firstname.',
            'firstname.min' => 'Please enter atleast 5 characters in first name.',
            'lastname.required' => 'Please enter lastname.',
            'email.required' => 'Please enter email.',
            'email.unique' => 'Email address already exists.',
            'email.email' => 'Please enter valid email address.',
            'phnno.required' => 'Please enter phone.',
            'phnno.numeric' => 'Please enter valid phone.'
        ]);

        $customer = customers::addCustomer($request);

        if($customer==true){
            return redirect('customers');
        }
    }

    Public function edit($customerid){
        $customer = customers::editCustomer($customerid);
        $custid = $customerid;

        return View::make('customer')->with(compact('customer', 'custid'));
    }

    Public function update(Request $request){
       $customer = customers::updateCustomer($request); 

       if($customer==true){
           return redirect('customers');
       }
    }

    Public function delete($customerid){
        $customer = customers::deleteCustomer($customerid);

        if(!empty($customer)){
            return redirect('customers');
        }
    }
}
