<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Order;
use App\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
        return view('orders.index', compact('orders'));
    }

    public function create($payment_method)
    {
        try {
            $order = null;
            switch ($payment_method) {
                case 'transference':
                    $order = Order::createOrder('Transferência Bancária');
                    break;
                case 'reference':
                    $order = Order::createOrder('Referência');
                    break;
                default:
                    throw new \Exception('Método de pagamento não encontrado');
            }

            Cart::destroy();

            if ($order) {
                return redirect()->route('orders.finish', ['id' => $order->id]);
            } else {
                throw new \Exception('Erro interno ao criar pedido');
            }
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->withErrors('Erro ao realizar pedido', $e->getMessage());
        }
    }

    public function finish(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $bank_accounts = BankAccount::all();

            switch ($order->payment->method) {
                case 'Transferência Bancária':
                    return view('orders.finish.transference', compact('bank_accounts', 'order'));
                    break;
                case 'Referência':
                    return view('orders.finish.reference', compact('order'));
                    break;
                default:
                    return redirect()->route('orders.index')->withErrors('Método de pagamento não encontrado');
            }
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->withErrors('Erro ao finalizar pedido', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order_products = OrderProduct::where('order_id', $id)->get();
        return view('orders.show', compact('order', 'order_products'));
    }
}
