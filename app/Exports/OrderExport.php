<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    public function view(): View
    {
        return view('exports.orders', [
            'orders' => Order::with(['address', 'payment', 'products', 'products.product', 'products.product.category'])->get()
        ]);
    }
}
