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

        $projects = Products::where('sku', $this->param->parameter('sku'))->get();

        return view('qr.index', compact('projects'));

    }
}
