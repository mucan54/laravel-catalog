<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use Orchid\Screen\Fields\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{


    public function __invoke(Request $request){

        $rules = array(
            'password'  => 'required|alphaNum|min:3'
        );
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->input(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
        
            // create our user data for the authenticat
        
            // attempt to do the login
            if (Customer::where('password',$request->input('password'))) {

                session()->put('database', 'database');
        
            }     

            return redirect('/');
            
        }
    }

}
