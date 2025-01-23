<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Order extends Model
{
    protected $table = 'orders';
    protected $primarykey = 'id';
    protected $fillable = ['total', 'status', 'user_id', 'sub_total', 'tax', 'freight_cost', 'address_id', 'tracking_code', 'sent_date', 'expected_date', 'delivered_date'];

    public function orderFields()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'total', 'price', 'tax');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public static function createOrder($payment_method = "Recibo")
    {
        $user = Auth::user();


        $totalWeight = 0;
        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $totalWeight += $cartItem->model->weight * $cartItem->qty;
        }

        $freightCost = $totalWeight * env('FREIGHT_PRICE');

        $order = $user->orders()->create([
            'address_id' => $user->address->id,
            'sub_total' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'freight_cost' => $freightCost,
            'total' => Cart::total() + $freightCost,
            'status' => 'Pendente',
        ]);

        $transaction_id = Str::uuid();

        while (Payment::where('transaction_id', $transaction_id)->count() > 0) {
            $transaction_id = Str::uuid();
        }

        $reference = substr(str_shuffle('123456789'), 0, 9);
        while (Payment::where('reference', $reference)->count() > 0) {
            $reference = substr(str_shuffle('123456789'), 0, 9);
        }

        Payment::create([
            'order_id' => $order->id,
            'transaction_id' => $transaction_id,
            'method' => $payment_method,
            'reference' => $reference
        ]);

        foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
                'tax' => $cartItem->tax,
                'total' => $cartItem->qty * $cartItem->price
            ]);
        }

        //$date = date('y-m-d');
        $date = date('Y-m-d', strtotime('+2'));
        //$newDate = date('Y-m-d', ($date. ' + 3 days'));

        $reference = [
            "amount"        => $order->total,
            //"amount"        => "53633",
            "end_datetime"  => "$date",
        ];
        //dd($reference);

        $data = json_encode($reference);
        $curl = curl_init();

        $httpHeader = [
            "Authorization: " . "Token " . "n98gr3jnjfpda4i3ilnthivmp7ulp8tb",
            "Accept: application/vnd.proxypay.v2+json",
            "Content-Type: application/json",
            "Content-Length: " . strlen($data)
        ];

        $opts = [
            CURLOPT_URL             => "https://api.sandbox.proxypay.co.ao/references/" . $order->payment->reference,
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

        return $order;
    }
}
