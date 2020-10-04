<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductDetailController extends Controller
{
    protected $_param;

    public function __construct(Request $request)
    {
        $this->param = $request->route();
    }

    
    public function __invoke()
    {

        $projects = Products::where('id', $this->param->parameter('id'))->first();

        return view('product', compact('projects'));

    }
}
