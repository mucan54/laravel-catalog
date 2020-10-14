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
        if($this->request->query('cat')!==null){

            $cat = Category::where('id',$this->request->query('cat') )->first()->name;
        }

        if($this->request->query('search')!==null || $this->request->query('cat')!==null){
            
            $products = Products::query();
            if ($this->request->query('search')!==null)
                $products = $products->where('name', 'like', '%'.$this->request->query('search').'%');

            if ($this->request->query('cat')!==null) 
                $products = $products->where('category', $this->request->query('cat'));
        }
        else
        $products = Products::latest();
        $attribute = Attribute::all();

        $products=$products->paginate(9)->onEachSide(3);


        return view('welcome', compact('products','attribute','cat'));

    }
}
