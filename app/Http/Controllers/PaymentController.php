<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {}

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

    public function addReceipt(Request $request, $id)
    {
        try {
            // if (!$request->hasFile('receipt_image') || !$request->file('receipt_image')->isValid()) {
            //     return back()->with('error_message', 'Nenhum arquivo enviado ou o arquivo é inválido.');
            // }

            $receipt_image = $request->file('receipt_image');
            $payment = Payment::find($id);
            $extension = $receipt_image->getClientOriginalExtension();
            $name = $payment->transaction_id;
            $fname = "$name.$extension";
            $receipt_image->storeAs('receipts', $fname, 'local');
            $payment->update(['receipt_image' => $fname, 'status' => 'Aguardando Confirmação']);

            return back()->with('success_message', 'Recibo adicionado com sucesso');
        } catch (\Exception $e) {
            dd($request->file('receipt_image'));
            // return back()->with('error_message', 'Erro ao adicionar recibo' . $e->getMessage());
        }
    }
}
