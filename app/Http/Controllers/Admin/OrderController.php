<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function send(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->status = 'Enviado';
            $order->tracking_code = $request->tracking_code;
            $order->sent_date = $request->sent_date;
            $order->expected_date = $request->expected_date;
            $order->save();

            return redirect()->route('admin.orders.index')->with('success_message', 'Pedido enviado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->withErrors('Erro ao enviar o pedido!');
        }
    }

    public function delivery($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->status = 'Entregue';
            $order->delivered_date = now();
            $order->save();

            return redirect()->route('admin.orders.index')->with('success_message', 'Pedido entregue com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->withErrors('Erro ao entregar o pedido!');
        }
    }

    public function export()
    {
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download(new OrderExport, 'orders.xlsx');
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $order = Order::findOrFail($id);
    //         $order->update($request->all());

    //         return redirect()->route('admin.orders.index')->with('success', 'Pedido actualizado com sucesso!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('admin.orders.index')->with('error', 'Erro ao actualizar o pedido!');
    //     }
    // }
}
