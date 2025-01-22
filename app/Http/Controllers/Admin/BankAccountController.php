<?php

namespace App\Http\Controllers\Admin;

use App\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank_accounts = BankAccount::paginate();
        return view('admin.bank-accounts.index', compact('bank_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            BankAccount::create($data);
            return redirect()->route('bank-accounts.index')->with('success_message', 'Conta bancária cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('bank-accounts.index')->withErrors('Não foi possível cadastrar a conta bancária!');
        }
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
            $bank_account = BankAccount::findOrFail($id);
            $data = $request->all();
            $bank_account->update($data);
            return redirect()->route('admin.bank-accounts.index')->with('success_message', 'Conta bancária actualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.bank-accounts.index')->withErrors('Não foi possível actualizar a conta bancária!');
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
        try {
            $bank_account = BankAccount::findOrFail($id);
            $bank_account->delete();
            return redirect()->route('admin.bank-accounts.index')->with('success_message', 'Conta bancária deletada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.bank-accounts.index')->withErrors('Não foi possível deletar a conta bancária!');
        }
    }
}
