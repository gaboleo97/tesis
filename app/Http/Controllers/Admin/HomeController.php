<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Product_Register;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
       // dd(\App\Models\Category::all());
       //$products = Product::all();// seleccionar los productos se encapsulan en la variable $products
       //$categories = Category::all();



       $productosVencidos = DB::select("SELECT p.name,COUNT(pr.state) as cantidad, pr.expiration_date FROM products p INNER JOIN inventories inv ON p.id = inv.product_id INNER JOIN product__registers pr ON inv.product_id = pr.inventory_id WHERE pr.expiration_date < NOW() AND pr.state = 2 GROUP BY p.name");

       $productosProximosVencer = DB::select("SELECT p.name,COUNT(pr.state) as cantidad, pr.created_at as admission, pr.expiration_date FROM products p INNER JOIN inventories inv ON p.id = inv.product_id INNER JOIN product__registers pr ON inv.product_id = pr.inventory_id WHERE pr.expiration_date BETWEEN NOW() AND DATE_ADD(NOW(),INTERVAL 20 DAY) AND pr.state = 1 GROUP BY p.name");

        $productosStockBajo = DB::select("SELECT p.id, p.name , inv.stock, pr.state, pr.expiration_date FROM products p INNER JOIN inventories inv ON p.id = inv.product_id INNER JOIN product__registers pr ON pr.inventory_id = inv.id WHERE pr.state = 1 AND inv.stock <= 10 GROUP BY p.id");

        $productosMasVendidos = DB::select("SELECT p.id, p.name , COUNT(pr.state) as vendido, pr.expiration_date FROM products p INNER JOIN inventories inv ON p.id = inv.product_id INNER JOIN product__registers pr ON pr.inventory_id = inv.id WHERE  pr.created_at BETWEEN DATE_ADD(NOW(),INTERVAL -30 DAY) AND NOW() AND pr.state = 0  GROUP BY p.name ORDER BY vendido DESC");

        $productosGeneral = DB::select("SELECT p.id, p.name, p.content , pr2.stock as stock , pr3.salida as salida, pr4.vencidos,COUNT(pr.inventory_id) as total FROM products p LEFT JOIN inventories inv ON p.id = inv.product_id LEFT JOIN product__registers pr ON pr.inventory_id = inv.id LEFT JOIN (SELECT COUNT(pr.state) as stock, pr.created_at
        FROM product__registers pr where pr.state = 1 GROUP BY pr.created_at) pr2 ON pr2.created_at = pr.created_at
        LEFT JOIN (SELECT COUNT(pr.state) as salida, pr.created_at
        FROM product__registers pr where pr.state = 0 GROUP BY pr.created_at) pr3 ON pr3.created_at = pr.created_at
        LEFT JOIN (SELECT COUNT(pr.state) as vencidos, pr.created_at
        FROM product__registers pr where pr.state = 2 GROUP BY pr.created_at) pr4 ON pr4.created_at = pr.created_at GROUP BY pr.inventory_id");

        return view('admin.index', ['productosVencidos' => $productosVencidos, 'productosProximosVencer' => $productosProximosVencer, 'productosStockBajo' => $productosStockBajo, 'productosMasVendidos' => $productosMasVendidos, 'productosGeneral' => $productosGeneral ]); //, ['products' => $products , 'categories' => $categories]);//pasar los productos a la vista
    }

    public function deleteVencidos(Request $request){
        $IDVencidos = DB::select("SELECT id from product__registers WHERE expiration_date < NOW() AND state = 1");

       //Actualizar en product_register
       for ($i = 0; $i < $IDVencidos; $i++) {
           //inserta cada producto segun la cantidad de stock que traiga

           $vencidos_id = $IDVencidos[$i];
           //$num= 0;
           //DB::table('product_registers')->where('id',$cantidad_id->id)->update(['state' => 0]);
           Product_Register::where('id', $vencidos_id->id)->update(['state' => 2]);

       }
       return response()->json(['success'=>'exito']);
    }

    public function datatable() {
        // dd(\App\Models\Category::all());
        //$products = Product::all();// seleccionar los productos se encapsulan en la variable $products
        //$categories = Category::all();

         return view('admin.table-datatable'); //, ['products' => $products , 'categories' => $categories]);//pasar los productos a la vista
     }
}
