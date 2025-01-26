<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::with('address')->paginate();
        return view('admin.clients.index', compact('clients'));
    }
}
