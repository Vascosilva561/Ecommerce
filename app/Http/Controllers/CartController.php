<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PDF;
// use Dompdf\Dompdf;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mightAlsoLike = Product::inRandomOrder()->take(4)->get();
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart')->with('mightAlsoLike', $mightAlsoLike);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->back()->with('success_message', 'O item já está no seu carrinho');
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');

        return redirect()->back()->with('success_message', 'item adicionado no carinho');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $product = Product::findOrFail($proId);
        Cart::update($id, $request->qty);
        return back()->with('status', 'SUCESSS');
        // Cart::update($id, $request->quantity);
        // return request()->json(['sucess' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'Item foi removido');
    }

    /**
     * Switch item for shopping cart to Save for later .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item ja foi salvo para mais tarde');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'item adicionado para mais tarde');
    }

    public function faturaProforma()
    {
        $dompdf = PDF::loadView('factura');

        return $dompdf->stream();
    }
}
