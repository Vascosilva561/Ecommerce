<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Imagens;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     Private $product; 

       public function __Construct(Product $product){
        $this->product = $product; 

    }


    public function index()
    {
        $categories = Category::pluck('name', 'id');
        $products = Product::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $formInput=$request->except('image');    
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'details'  => 'required', 
            'price'  => 'required', 
            'description'  => 'required', 
            'featured'  => 'required',
            'category_id'=>'required',
            'stock'=>'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:40000',

        ]);

   /* $image=$request->image; 
    //dd($image);
        if ($image) {
            $imageName=$image->getClientOriginalName();
            $image->move('images/product',$imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);
        return redirect()->back();*/

        $fname="";
        $inserte;
        if ($request->hasFile('image')){
            $extension = $request->image->extension();
            $request->file('image');
            $name = uniqid(date('HisYmd'));
            $fname = "$name.$extension";

            $inserte = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'details'  => $request->details, 
            'price'  => $request->price, 
            'description'  => $request->description, 
            'featured'  => $request->featured,
            'category_id'=>$request->category_id,
            'stock'=>$request->stock,
            'image'=> $fname,
       ]);

        }
        ($inserte);
        if ($inserte) {
            if ($request->hasFile('image')) {
                $request->image->storeAs('product',"$fname");
            }

        $fname="";
        $insert;
        if ($request->hasFile('img')){
            foreach ($request->img as $foto) {
                $extension = $foto->extension();
                $request->file('img');
                $name = uniqid(date('HisYmd'));
                $fname = "$name.$extension";

                $insert = Imagens::create([
                 'img'=> $fname,
                 'image_id' => $inserte->id,
             ]);

            if ($insert) {
            if ($request->hasFile('image')) {
                $foto->storeAs('product',"$fname");
            }
        }
    }
}
return redirect()->route('products.index')->with('sucesso','Operação efetuada com sucesso');
}else{
    return redirect()->back();
}

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //$imagens = Imagens::whereimage_id($id)->ORDERBY('id','desc')->get();
         //return view('site/photo', compact('galerias','departamentos','cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

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
}
