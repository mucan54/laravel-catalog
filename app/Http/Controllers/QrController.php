<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use SimpleSoftwareIO\QrCode\Generator;
use App\Helpers\SVGConvert;

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

    public function make($sku){

        $qrcode = new Generator;
        $qrcode = $qrcode->format('svg')->size(150)->generate(url("/qr/".$sku."/".substr(md5($sku), 0, 5)));
        echo "
        <style>#qrcode{ width:150px; }</style>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js'></script>
     <body id='body'>
     <div id='qrcode'>
     <img src='".SVGConvert::base64EncodeImage($qrcode)."'>
     <p id = \"GFG_DOWN\" style = \"font-size: 22px;margin-top: -3px;text-align: center;\">".$sku."</p>  
     </div>
     <script>
     html2canvas(document.querySelector(\"#qrcode\")).then(canvas => {
        document.body.appendChild(canvas)
        var link = document.createElement('a');
        link.download = '".$sku.".png';
        link.href = canvas.toDataURL()
        link.click();
        window.history.back();
    });
     </script>
     </body>
     ";


    }
}
