<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate();
        return view('admin.payments.index', compact('payments'));
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
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());

            return redirect()->route('admin.payments.index')->with('success_message', 'Pagamento actualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')->withErrors('Erro ao actualizar o pagamento!');
        }
    }

    public function confirm($id)
    {
        try {
            $payment = Payment::findOrfail($id);
            $payment->status = 'Confirmado';
            $payment->save();

            $payment->order->status = 'Pagamento Aprovado';
            $payment->order->save();

            return redirect()->route('admin.payments.index')->with('success_message', 'Pagamento confirmado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')->withErrors('Erro ao confirmar o pagamento!');
        }
    }

    public function cancel($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->status = 'Cancelado';
            $payment->save();

            $payment->order->status = 'Cancelado';
            $payment->order->save();

            return redirect()->route('admin.payments.index')->with('success_message', 'Pagamento cancelado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')->withErrors('Erro ao cancelar o pagamento!');
        }
    }

    public function refund($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->status = 'Reembolsado';
            $payment->save();

            $payment->order->status = 'Cancelado';
            $payment->order->save();

            return redirect()->route('admin.payments.index')->with('success_message', 'Pagamento reembolsado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')->withErrors('Erro ao reembolsar o pagamento!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
