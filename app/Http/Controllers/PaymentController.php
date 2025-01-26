<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function addReceipt(Request $request, $id)
    {
        try {
            if (!$request->hasFile('receipt_image') || !$request->file('receipt_image')->isValid()) {
                return back()->withErrors('Nenhum arquivo enviado ou o arquivo é inválido.');
            }




            $receipt_image = $request->file('receipt_image');
            $payment = Payment::findOrFail($id);
            if ($payment->receipt_image !== "") {
                Storage::disk('local')->delete("receipts/$payment->receipt_image");
            }
            $extension = $receipt_image->getClientOriginalExtension();
            $name = $payment->transaction_id;
            $fname = "$name.$extension";
            $receipt_image->storeAs('receipts', $fname, 'local');
            $payment->update(['receipt_image' => $fname, 'status' => 'Aguardando Confirmação']);

            return redirect()->route('orders.show', ['id' => $payment->order_id])->with('success_message', 'Recibo adicionado com sucesso');
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao adicionar recibo' . $e->getMessage());
        }
    }
}
