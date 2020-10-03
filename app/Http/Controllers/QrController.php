<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class QrController extends Controller
{
    protected $_param;

    public function __construct(Request $request)
    {
        $this->param = $request->route();
    }

    
    public function __invoke()
    {

        if($this->param->parameter('pass')==substr(md5($this->param->parameter('sku')), 0, 5))
        $projects = Products::where('sku', $this->param->parameter('sku'))->first();
        else
        return view('welcome');


        return view('qr.index', compact('projects'));

    }
}
