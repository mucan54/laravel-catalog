<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use Orchid\Screen\Fields\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Stats;

class CustomerController extends Controller
{


    public function login(Request $request){

        $rules = array(
            'password'  => 'required|alphaNum|min:3'
        );

        
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) 
                ->withInput($request->except('password')); 
        } else {

            $user=Customer::where('password',$request->input('password'))->first();
        
            if ($user!== null) {

                $stat= new Stats;

                $stat->product_name='Üye Girişi';
                $session = sha1(time());
                $stat->user_id = $user->id;
                $stat->user_name = $user->name;
                $stat->session = $session;
                $stat->save();
                
                session()->put('user_name', $user->name);
                session()->put('user_id', $user->id);
                session()->put('sessionId', $session);
        
            }     

            return redirect('/');
            
        }
    }


    public function logout(Request $request){

                
                session()->forget('user_name');
                session()->forget('user_id');
                session()->forget('sessionId');
                return redirect('/');
    
    }

}
