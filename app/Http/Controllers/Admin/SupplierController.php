<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $suppliers = Supplier::paginate();
        return view('admin.suppliers.index', compact('suppliers', 'categories'));
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
            Supplier::create($request->all());
            return redirect()->route('admin.suppliers.index')->with('success_message', 'Fornecedor cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.suppliers.index')->withErrors('Não foi possível cadastrar o fornecedor!');
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
            $supplier = Supplier::findOrFail($id);
            $supplier->update($request->all());
            return redirect()->route('admin.suppliers.index')->with('success_message', 'Fornecedor actualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.suppliers.index')->withErrors('Não foi possível actualizar o fornecedor!');
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
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            return redirect()->route('admin.suppliers.index')->with('success_message', 'Fornecedor excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.suppliers.index')->withErrors('Não foi possível excluir o fornecedor!');
        }
    }
}
