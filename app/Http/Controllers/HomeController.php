<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Mail;
use App\Mail\mailtest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$category = Category::find(1); // busca la categoria con id = 1
        //dd($category->products); // muestra los productos asociados a la categoria de id = 1
        $categories = Category::all();
        $products = Product::all();
        return view('index', ['categories' => $categories, 'products' => $products]);
    }

    public function home()
    {
        return view('admin.index');
    }

    public function productoDetalle()
    {
        $categories = Category::all();
        return view('productoDetalle', ['categories' => $categories]);
    }

    public function nosotros()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('nosotros', ['categories' => $categories, 'products' => $products]);
    }

    public function contacto(Request $request)
    {


        $categories = Category::all();
        $products = Product::all();
        return view('contacto', ['categories' => $categories, 'products' => $products]);
    }

    public function envioMail(Request $request) {


        $objDemo = new \stdClass();
        $objDemo->text = 'Demo One Value';

        Mail::to("gabrieleonardo.97@gmail.com")->send(new mailtest($objDemo));

    }

    public function products() {
        $categories = Category::all();
        $products = Product::all();
        return view('products', ['categories' => $categories, 'products' => $products]);
    }

    public function productByCategory($category)
    {
        $categories = Category::all();
        //$products = Product::all();
        $category = Category::where('name', '=', $category)->first();
        $categoryIdSelected = $category->id;
        $products = Product::where('category_id', '=', $categoryIdSelected)->get();
        //dd($products);
        return view('products', ['categories' => $categories, 'products' => $products, 'categoryIdSelected' => $categoryIdSelected]);
    }

}
