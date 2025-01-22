<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{




    private $category;

    public function __Construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.categories.index', compact('categories'));
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
            'image' => 'required',
        ]);

        $insert = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => '',
        ]);

        if ($insert) {
            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $name = uniqid(date('HisYmd'));
                $fname = "$name.$extension";
                $request->image->storeAs('categories', $fname, 'local');
                $insert->update(['image' => $fname]);
            }
            return back()->with('success_message', 'Categoria criada com sucesso');
        } else {
            return redirect()->back()->withErrors('Erro ao criar a categoria');
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
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        //Recuperar os dados pelo ID
        $category = $this->category->find($id);
        //Alterando os dados
        $update = $category->update($request->except("image"));

        if ($update) {
            if ($request->hasFile('image')) {
                if ($category->image !== "") {
                    Storage::disk('local')->delete("categories/$category->image");
                }

                $extension = $request->image->extension();
                $name = uniqid(date('HisYmd'));
                $fname = "$name.$extension";
                $request->image->storeAs('categories', $fname, 'local');
                $category->update(['image' => $fname]);
            }
            return back()->with('success_message', 'Categoria actualizada com sucesso');
        } else {
            return back()->with('error_message', 'Erro ao actualizar a categoria');
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
        $this->category->where('id', $id)->delete();

        return back()->with('success_message', 'Categoria deletada com sucesso');
    }
}
