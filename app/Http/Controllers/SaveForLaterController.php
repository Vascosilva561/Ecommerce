<?php

namespace App\Http\Controllers;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);
        return back()->with('success_message', 'Item foi removido');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function switchToCart($id){

        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use ($id){
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is alerts you cart');
        }

         Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
                 ->associate('App\Product');

                 return redirect()->route('cart.index')->with('success_message', 'item mover para ocarinho'); 
    }



    public function index(){
        return view('references.index');
    }









     public function create(){

/*$payment = [
    "reference_id"  => 904800000,
    "amount"        => "701.84"
];


$data = json_encode($payment);*/
$reference = [
    "amount"        => "21000",
    "end_datetime"  => "2020-07-05",
    
];

$data = json_encode($reference);

$curl = curl_init();

$httpHeader = [
    "Authorization: " . "Token " . "n98gr3jnjfpda4i3ilnthivmp7ulp8tb",
    "Accept: application/vnd.proxypay.v2+json",
    "Content-Type: application/json",
    "Content-Length: " . strlen($data)
];

$opts = [
   CURLOPT_URL             => "https://api.sandbox.proxypay.co.ao/references/904800007",
   CURLOPT_CUSTOMREQUEST   => "PUT",
    //CURLOPT_URL             => "https://api.sandbox.proxypay.co.ao/payments",
    //CURLOPT_CUSTOMREQUEST   => "POST",
    CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_TIMEOUT         => 30,
    CURLOPT_HTTPHEADER      => $httpHeader,
    CURLOPT_POSTFIELDS      => $data
];


//dd($opts);
curl_setopt_array($curl, $opts);


$response = curl_exec($curl);


$err = curl_error($curl);

curl_close($curl);
dd($response);


return response()->json($opts, 504);

    }



}
