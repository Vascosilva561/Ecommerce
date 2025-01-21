<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\Category;
use App\OrderProduct;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Buscar Todoas as categorias com os seus productos!
        $categories = Category::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }

        //Productos Mais vendidos
        $id = OrderProduct::select(
            'product_id',
            DB::raw('count(*) as total')
        )->groupBy('product_id')
            ->orderByRaw('count(*) DESC')
            ->pluck('product_id');

        $total     = Product::whereIn('id', $id)->take(6)->get();
        $promocoes = Product::inRandomOrder()->take(3)->get();
        $products  = Product::inRandomOrder()->wherefeatured(1)->take(12)->get();
        $news      = Product::orderBy('id', 'DESC')->take(12)->get();
        $news_destaque = Product::inRandomOrder()->take(1)->get();
        $view_counts = Product::orderBy('view_count', 'DESC')->take(8)->get();

        $highlights = Product::where('highlight', 1)->get();

        return view('home', compact('products', 'promocoes', 'news', 'news_destaque', 'total', 'view_counts', 'categories', 'highlights'));
    }

    public function addWishlist(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->prod_id = $request->prod_id;

        $wishlist->save();
        $products = DB::table('products')->where('id', $request->prod_id)->get();
        return redirect()->back();
    }

    public function View_wishList()
    {

        $user = Auth::user();
        /*
    $products = Wishlist::where('user_id', '=', $user->id)->leftJoin('products','Wishlist.prod_id','=', 'products.id')->get();
    return view('wishlist', compact('products'));*/


        $products = DB::table('wishlists')->where('user_id', '=', $user->id)->leftJoin('products', 'wishlists.prod_id', '=', 'products.id')
            ->get();
        return view('wishlist', compact('products'));
    }

    public function removeWishlist($id)
    {
        $user = Auth::user();
        DB::table('wishlists')->where('prod_id', '=', $id)->where('user_id', '=', $user->id)->delete();
        return back()->with('status', 'Item Removido da Lista de Desejo');
        # code...
    }
}
