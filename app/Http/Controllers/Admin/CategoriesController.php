<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use NunoMaduro\Collision\Contracts\RenderlessTrace;
use Whoops\Run;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function index() {
       // dd(\App\Models\Category::all());
       $categories = Category::all();// seleccionar las categorias se encapsulan en la variable $categories
        return view('admin.categories.index', ['categories' => $categories]);//pasar las categorias a la vista
    }

    public function store(Request $request) {
        //dd(\App\Models\Category::all());
        //Category::create([
         //   'name' => $request->category
       // ]);
       $newCategory = new Category();

            $newCategory->name = $request->name;
            $newCategory->save(); // save() para guardar el objeto

        //dd($request->category); // para traer informacion especifica del form desde el atributo name
        //dd($request->all()); //para traer toda la info del form
        //echo "Categoria $newCategory->name ha sido creada con exito";
        //return view('admin.categories.index');
        return redirect()->back(); //para redirigir a la vista anterior
    }

    public function update(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }

    public function delete(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()->back();
    }
}
