<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use SimpleSoftwareIO\QrCode\Generator;

class QrController extends Controller
{
    protected $_param;

    public function __construct(Request $request)
    {
        $this->param = $request->route();
    }

    
    public function page()
    {

        if($this->param->parameter('pass')==substr(md5($this->param->parameter('sku')), 0, 5))
        $projects = Products::where('sku', $this->param->parameter('sku'))->first();
        else
        return view('welcome');


        return view('qr.index', compact('projects'));

    }

    public function download($sku){

        $qrcode = new Generator;
        $qrcode = $qrcode->format('eps')->size(150)->generate(url("/qr/".$sku."/".substr(md5($sku), 0, 5)));

        echo header('Content-Disposition: attachment; filename="'.$sku.'.eps"');
        echo $qrcode;


    }
}
