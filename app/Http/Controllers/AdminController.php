<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Imagens;
use Cache;
use App\Category;
use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

//use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $total_orders = Order::count();
        $total_sales = Payment::where("status", "Confirmado")->with("order")->get()->sum("order.total");
        $pendent_payments = Payment::whereIn("status", ["Pendente", "Aguardando Confirmação"])->count();
        $total_users = User::count();
        $per_day_sales = Order::select(DB::raw('DATE(created_at) as date'), DB::raw("sum(total) as total"))
            ->groupBy('date')
            ->orderBy("date", "ASC")
            ->where("created_at", ">", Carbon::now()->addDays(-31))
            ->whereHas("payment", function ($query) {
                $query->where("status", "Confirmado");
            })
            ->get();
        return view('admin.index')->with(compact("total_orders", "total_sales", "pendent_payments", "total_users", 'per_day_sales'));;
    }

    public function login()
    {
        return view('admin.login');
    }


    public function postLogin(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|min:3|max:50',
            'password' => 'required|min:6|max:50',
        ]);


        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        //dd($credentials);
        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin/login')
                ->withErrors(['errors' => 'Login Invalido!'])
                ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}
