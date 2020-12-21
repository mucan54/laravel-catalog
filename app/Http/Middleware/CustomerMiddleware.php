<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Stats;
use App\Models\Products;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (session()->has('sessionId')) {

            $stat= new Stats;

            if($request->route()->parameter('sku') || $request->route()->parameter('search') || $request->route()->parameter('cat'))
            {
                if($request->route()->parameter('sku'))
                
                $product = Products::where('sku',$request->route()->parameter('sku'))->first();
                $stat->product_id=$product->sku;
                if($request->route()->parameter('search'))
                $stat->search=$request->route()->parameter('search');
                else if($request->route()->parameter('cat'))
                $stat->search='Kategori '.$request->route()->parameter('search');
    
                $stat->user_id = session()->get('user_id');
                $stat->user_name = session()->get('user_name');
                $stat->session = session()->get('sessionId');
                $stat->save();

            }

            return $next($request);
        }
        else if (config('app.auth_config')){

            return $next($request);
        }
        else
        return response(view('login'));
    }


}
