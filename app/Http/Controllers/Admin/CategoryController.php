<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{




       Private $category; 

       public function __Construct(Category $category){
        $this->category = $category; 

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
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
                'name'=>'required',
                'slug'=>'required',
                'image'=>'required',
        ]);
        $fname="liga1";
        if ($request->hasFile('image')){
            $extension = $request->image->extension();
            $request->file('image');
            $name = uniqid(date('HisYmd'));
            $fname = "$name.$extension";
        }

            $insert = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image'=> $fname,
       ]);
        
        if ($insert) {
            if ($request->hasFile('image')) {
                $request->image->storeAs('categories',"$fname");
            }
        return back()->with('success_message', 'Obrigado! Seu pagamento foi efetuado com sucesso');
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
        //
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
            $this->validate($request, [
            'name'=>'required',
            'slug'=>'required',

        ]);

        //Recuperar os dados pelo ID
        $category = $this->category->find($id);
dd($category);
        //Alterando os dados
        $update = $category->update($request->all());

       
           return 'error';
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
