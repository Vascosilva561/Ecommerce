<?php

namespace App\Http\Controllers;

use App\Address;
//use App\Envio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//Use Laracasts\Flash\Flash;

class AddressController extends Controller
{
    public function index()
    {
        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('registerAddress.index');
        }
        return view('address.index');
    }


    public function address(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'endereco' => 'required',
            'ponto_referencia' => 'required',
            'telefone' => 'required',
            'pais' => 'required',
            'municipio' => 'required',
            'provincia' => 'required',
            'identificacao' => 'required',


        ]);
        $request['user_id'] = Auth::user()->id;

        Address::create($request->all());

        return redirect()->route('profile.address')->with('success_message', 'Endereço Actualizado com Sucesso');
    }

    public function viewAddress(Request $request)
    {

        $user_id = Auth::user()->id;
        $addresses = Address::where('user_id', $user_id)->get();
        return view('address.viewAddress', compact('addresses'));
    }

    public function editAddress($id)
    {

        $address = Address::find($id);
        return view('address.update')->with('address', $address);
    }

    public function updateAddress(Request $request, $id)
    {

        $address = Address::find($id);
        $address->update($request->except('redirect-to'));

        $address->save();

        //Flash::warnings('O Endereço do usuario' . $address->name . 'Foi actualizado com sucesso');
        if ($request->has('redirect-to')) {
            return redirect($request->get('redirect-to'))->with('success_message', 'Endereço Actualizado com Sucesso');
        } else {
            return redirect()->back()->with('success_message', 'Endereço Actualizado com Sucesso');
        }
    }

    //    public function updateAddress(){

    //     return view('address.send');
    // }

    /*    public function productSend(Request $request)
    {
        $this->validate($request,[

            'option'=>'required',
        ]);
        $request['user_id']=Auth::user()->id;
        //$request['address_id']=Auth::user()->id;
        Envio::create($request->all());

        return redirect()->route('payment.payment')->with('success_message', 'item adicionado no carinho');

    }*/
}
