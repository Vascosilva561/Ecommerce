<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Imagens;
use Cache;
use App\Category;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 18;
        $categories = Category::all();

        if (request()->category) {
           $products = Product::with('categories')->whereHas('categories', function($query){
            $query->where('slug', request()->category);
           });
           //$categories = Category::all();
           //$categoryName = $categories->where('slug', request()->category)->first()->name;
           $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }else{
            $products = Product::take(12);
            //$categories = Category::all();
            $categoryName = 'Destaque';

        }
        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }else{
            $products = $products->paginate($pagination);
        }
        
        $total_counts = Product::count();
      

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'total_counts' => $total_counts,
        ]);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){

        $products = Product::where('id', $slug)->get();
        $product = Product::where('id', $slug)->firstOrFail();
         
         if (Cache::has($slug)==false) {
            Cache::add($slug, 'visualizacao', 0.30);
            $product->view_count+=1;
            $product->save();
           
         }
           // $view_counts = Product::orderBy('view_count', 'DESC')->take(8)->get();

            //$products=DB::table('products')->where('id',$id)->get();

            $mightAlsoLike = Product::where('view_count', '!=', $slug)->orderBy('view_count', 'DESC')->mightAlsoLike()->get();
            $imagens = Imagens::whereimage_id($slug)->get();
        
        return view('product', compact('imagens', 'product', 'mightAlsoLike', 'products'));
       
    }



}