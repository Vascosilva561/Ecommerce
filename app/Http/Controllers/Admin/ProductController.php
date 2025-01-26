<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Imagens;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $product;

    public function __Construct(Product $product)
    {
        $this->product = $product;
    }


    public function index()
    {
        $categories = Category::pluck('name', 'id');
        $products = Product::paginate();
        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formInput = $request->except('image');

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'details'  => 'required',
            'price'  => 'required',
            'description'  => 'required',
            'featured'  => 'required',
            'category_id' => 'required',
            'stock' => 'required',
        ]);

        /* $image=$request->image;
    //dd($image);
        if ($image) {
            $imageName=$image->getClientOriginalName();
            $image->move('images/products',$imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);
        return redirect()->back();*/
        $formInput['image'] = "";
        $product = Product::create($formInput);

        if ($product) {
            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $request->file('image');
                $name = uniqid(date('HisYmd'));
                $fname = "$name.$extension";
                $request->image->storeAs('products', $fname);
                $product->update(['image' => $fname]);
            }
            return redirect()->back()->with('sucesso', 'Producto criado com sucesso');
        } else {
            return redirect()->back()->withErrors('Erro ao criar o producto');
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
        $product = Product::findOrFail($id);
        $formInput = $request->except('image');
        $product->update($formInput);

        if ($request->hasFile('image')) {
            Storage::delete("products/$product->image");
            $extension = $request->image->extension();
            $name = uniqid(date('HisYmd'));
            $fname = "$name.$extension";
            $request->image->storeAs('products', $fname);
            $product->update(['image' => $fname]);
        }

        return redirect()->back()->with('success_message', 'Produto actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Producto deletado com sucesso');
    }
}
