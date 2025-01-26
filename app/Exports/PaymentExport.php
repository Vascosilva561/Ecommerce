<?php

namespace App\Exports;

use App\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentExport implements FromView
{
    public function view(): View
    {
        return view('exports.payments', [
            'payments' => Payment::with(['order', 'order.address'])->get()
        ]);
    }
}
