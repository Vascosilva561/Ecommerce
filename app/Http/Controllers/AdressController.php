<?php

namespace App\Http\Controllers;

use App\Adress;
//use App\Envio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//Use Laracasts\Flash\Flash;

class AdressController extends Controller
{
    public function index(){
    	 if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('register_adress.index');
        }
    	return view('address.index');
    }


    public function address(Request $request){


    	$this->validate($request,[

    		'name'=>'required',
            'email'=>'required',
            'endereco'=>'required',
            'ponto_referencia'=>'required',
            'telefone'=>'required',
            'pais'=>'required',
            'municipio'=>'required',
            'provincia'=>'required',
            'identificacao'=>'required',


    	]);
    	$request['user_id']=Auth::user()->id;

    	Adress::create($request->all());

    	return redirect()->route('address.viewAddress')->with('success_message', 'Endereço Actualizado com Sucesso');

    }

	public function viewAddress(Request $request){

		$user_id = Auth::user()->id;
    	$address=DB::table('adresses')->where('user_id',$user_id)
    	->limit(1)->get();
    	return view('address.viewAddress', compact('address'));

    }

     public function editAdress($id){

        $addres = Adress::find($id);
       return view('address.update')->with('addres', $addres);
    }

    public function updateAdress(Request $request, $id){

        $addres = Adress::find($id);
        $addres ->name = $request->name; 
        $addres ->email = $request->email; 
        $addres ->endereco = $request->endereco; 
        $addres ->ponto_referencia = $request->ponto_referencia; 
        $addres ->telefone = $request->telefone; 
        $addres ->pais = $request->pais;
        $addres ->municipio = $request->municipio;
        $addres ->provincia = $request->provincia;
        $addres ->identificacao = $request->identificacao;

        $addres->save();

        //Flash::warnings('O Endereço do usuario' . $addres->name . 'Foi actualizado com sucesso');
        return redirect()->route('address.viewAddress');
    }

 //    public function updateAdress(){

 //     return view('address.send');
 // }

/*    public function productSend(Request $request)
    {
        $this->validate($request,[

            'option'=>'required',
        ]);
        $request['user_id']=Auth::user()->id;
        //$request['adress_id']=Auth::user()->id;
        Envio::create($request->all());

        return redirect()->route('paymant.paymant')->with('success_message', 'item adicionado no carinho');
        
    }*/

}
