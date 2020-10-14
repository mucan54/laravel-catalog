<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Attribute;

class AllProductsController extends Controller
{

    protected $_request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function __invoke()
    {


        $cat='';
        $attr='';

        if($this->request->query('search')!==null || $this->request->query('str')!==null){
            
            $products = Products::query();
            if ($this->request->query('search')!==null)
                $products = $products->where('name', 'like', '%'.$this->request->query('search').'%');

            if ($this->request->query('str')!==null){ 
                $parameter=explode('-', $this->request->query('str'));
                $products = $products->whereHas('attributevalues', function($q) use($parameter) {
                    $q->whereIn('attributevalue.id', $parameter);

                });
            }
        }
        else
        $products = Products::latest();
        $attribute = Attribute::all();

        $products=$products->paginate(9)->onEachSide(3);


        return view('welcome', compact('products','attribute'));

    }
}
