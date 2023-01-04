<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Product_Register;
use Illuminate\Http\Request;
use DB;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //


    public function index()
    {
        // dd(\App\Models\Category::all());
        $products = Product::all(); // seleccionar los productos se encapsulan en la variable $products
        $categories = Category::all();
        $inventories = Inventory::all();

        return view('admin.products.index', ['products' => $products, 'categories' => $categories, 'inventories' => $inventories]); //pasar los productos a la vista
    }

    public function store(Request $request)
    {
        //dd(\App\Models\Category::all());
        //Category::create([
        //   'name' => $request->category
        // ]);



        $newProduct = new Product();

        //dd($request->hasFile('featured'));
        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $newProduct->featured = $destinationPath . $filename;
        }

        $newProduct->category_id = $request->category_id;
        $newProduct->name = $request->name;
        $newProduct->content = $request->content;
        $newProduct->price = $request->price;
        $newProduct->buying_price = $request->buying_price;
        $newProduct->utility = $request->utility;
        //$newProduct->admission = $request->admission;
        //$newProduct->expiration = $request->expiration;
        $newProduct->save(); // save() para guardar el objeto

        //dd($request->category); // para traer informacion especifica del form desde el atributo name
        //dd($request->all()); //para traer toda la info del form
        //echo "Categoria $newCategory->name ha sido creada con exito";
        //return view('admin.categories.index');
        return redirect()->back(); //para redirigir a la vista anterior
    }

    public function addInventory(Request $request, $productId)
    {
        $product = Product::find($productId);

        $idproducto = inventory::select("product_id")->where("product_id", "=", $productId)->exists();
        //dd($idproducto);
        $productos = $idproducto;
        //$idproducto = DB::table('inventories')->where('product_id', $product)->exists();
        //dd($productos);
        $stock = $request->stock;
        if ($productos) {
            //obtengo el id de invetaries
            $id_invetory = inventory::select("id")->where("product_id", "=", $productId)->get();
            $id_invetory =  $id_invetory[0]['id'];

            // Update inventories
            $stockOld  = $request->stockOld;
            $stock = $request->stock;
            $sumaStock = $stockOld + $stock;
            inventory::where('product_id', $productId)->update(['stock' =>  $sumaStock]);
        } else {
            // Insert a inventories si no existe
            $newProduct = new inventory();
            $newProduct->product_id = $productId;
            $newProduct->stock = $request->stock;
            $newProduct->save();
            $id_invetory = $newProduct->id;
        }

        //guardar en product_register
        for ($i = 0; $i < $stock; $i++) {
            //inserta cada producto segun la cantidad de stock que traiga
            $newProduct = new Product_Register();
            $newProduct->inventory_id = $id_invetory;
            $newProduct->state = 1;
            $newProduct->expiration_date = $request->expiration_date;
            $newProduct->save();
        }


        return redirect()->back();
    }

    public function stock()
    {
        $stock = DB::select("SELECT pto.id, ctg.name as category, pto.name, pr.created_at, pr.expiration_date, pr2.inicio as inicio , pr3.salida as salida, CASE WHEN inicio > 0 THEN 'Hay Stock' ELSE 'No hay Stock' END AS state
        FROM product__registers as pr INNER JOIN inventories inv ON inv.id = pr.inventory_id
        INNER JOIN products pto ON pto.id = inv.product_id
        INNER JOIN categories ctg ON ctg.id = pto.category_id
        LEFT JOIN (SELECT COUNT(pr.state) as inicio, pr.created_at
        FROM product__registers pr where pr.state = 1 GROUP BY pr.created_at) pr2 ON pr2.created_at = pr.created_at
        LEFT JOIN (SELECT COUNT(pr.state) as salida, pr.created_at
        FROM product__registers pr where pr.state = 0 GROUP BY pr.created_at) pr3 ON pr3.created_at = pr.created_at
        GROUP BY pr.created_at");
        //SELECT p.id as products, iv.id as inventories, pr.id as product__registers FROM `products` p INNER JOIN `inventories` iv ON p.id = iv.product_id INNER JOIN `product__registers` pr ON iv.id = pr.inventory_id WHERE p.id = '4' AND pr.expiration_date <= NOW() AND pr.state = '1' LIMIT 3
        //SELECT * FROM `products` p INNER JOIN `inventories` iv ON p.id = iv.product_id INNER JOIN `product__registers` pr ON iv.id = pr.inventory_id WHERE p.id = '4' AND pr.expiration_date <= NOW() AND pr.state = '1';
        // dd(\App\Models\Category::all());
        $products = Product::all(); // seleccionar los productos se encapsulan en la variable $products
        $categories = Category::all();
        $inventories = Inventory::all();
        return view('admin.controlStock.index', ['products' => $products, 'categories' => $categories, 'inventories' => $inventories, 'stock' => $stock]); //pasar los productos a la vista
    }

    public function updateStock(Request $request) {

        $productId = $request->producto;
        $idproducto = inventory::select("product_id", "stock")->where("product_id", "=", $productId)->get();
        $id = $idproducto;
        $idproducto =  $idproducto[0];
        $name = $request->name;
        $stock = $request->stock;
        // Update inventories
        $stockActual  = $idproducto["stock"];
        $stockNew = $request->stock;
        $restaStock = $stockActual - $stock;

        inventory::where('product_id', $idproducto["product_id"])->update(['stock' =>  $restaStock]);
        $cantidad = DB::select("SELECT pr.id  FROM products p INNER JOIN inventories iv ON p.id = iv.product_id INNER JOIN product__registers pr ON iv.id = pr.inventory_id WHERE p.id = $productId AND pr.expiration_date >= NOW()  AND pr.state = '1'");
        //Actualizar en product_register
        for ($i = 0; $i < $stockNew; $i++) {
            //inserta cada producto segun la cantidad de stock que traiga

            $cantidad_id = $cantidad[$i];
            //$num= 0;
            //DB::table('product_registers')->where('id',$cantidad_id->id)->update(['state' => 0]);
            Product_Register::where('id', $cantidad_id->id)->update(['state' => 0]);

        }

        return redirect()->back();
    }
/*
    public function store1(Request $request)
    {

        $mensaje = "EL cliente ha sido creado correctamente";
        $tipo = "success";

        $Purchases = new Purchases();
        $Purchases->purchase_order_number = Request('numpurch');
        $Purchases->supplier_id = Request('supplierid');
        $Purchases->subtotal = Request('subtotals');
        $Purchases->tax  = Request('ivas');
        $Purchases->total = Request('totals');
        $Purchases->purchase_date = Request('datepurch');
        $Purchases->tax_value  = 16;

        $Purchases->save();
        if (!$Purchases) {

            $mensaje = "Error agregando tipificacion";
            $tipo = "danger";
        }
        $id_Purchasest = $Purchases->id;

        $nums = Request('numrow');

        for ($i = 0; $i < $nums; $i++) {


            $thearray =  Products::select("product_id")->where("product_code", "=", Request('datatab')[$i][0])->get();
            $products = $thearray[0];

            $Contacts_Customers = new Purchases_products();
            $Contacts_Customers->purchase_id  =   $id_Purchasest;
            $Contacts_Customers->product_id =   $products['product_id'];
            $Contacts_Customers->qty = Request('datatab')[$i][4];
            $Contacts_Customers->unit_price  = Request('datatab')[$i][5];
            $Contacts_Customers->expiration_date = Request('datatab')[$i][3];
            $Contacts_Customers->save();


            $invebt = DB::table('inventories')->where('product_id', $products['product_id'])->exists();

            var_dump($invebt);
            if ($invebt) {

                $inventories =  Inventories::select("inventory_id", "product_id", "product_quantity")->where("product_id", "=",  $products['product_id'])->get();
                $invento = $inventories[0];



                $sumat = $invento["product_quantity"] + Request('datatab')[$i][4];
                $contserl = Request('datatab')[$i][4];

                $productss = DB::table('inventories')->where('product_id', $products['product_id'])->update(['product_quantity' =>   $sumat]);


                for ($j = 1; $j <= $contserl; $j++) {

                    $Products_serials = new Products_serials();
                    $Products_serials->inventory_id  =   $invento["inventory_id"];
                    $Products_serials->serial = uniqid();
                    $Products_serials->expiration_date  = Request('datatab')[$i][3];
                    $Products_serials->status_id =  1;
                    $Products_serials->active  =   1;
                    $Products_serials->save();
                }
            } else {

                $Inventoriesss = new Inventories();
                $Inventoriesss->product_id  =   $products['product_id'];
                $Inventoriesss->product_quantity =  Request('datatab')[$i][4];
                $Inventoriesss->save();

                $id_Inventoriesss = $Inventoriesss->id;
                $contserle = Request('datatab')[$i][4];
                for ($r = 1; $r <= $contserle; $r++) {

                    $Products_s = new Products_serials();
                    $Products_s->inventory_id  =   $id_Inventoriesss;
                    $Products_s->serial = uniqid();
                    $Products_s->expiration_date  = Request('datatab')[$i][3];
                    $Products_s->status_id =  1;
                    $Products_s->active  =   1;
                    $Products_s->save();
                }
            }
        }




        if (!$Purchases) {


            $mensaje = "Error agregando tipificacion";
            $tipo = "danger";
        }
        return redirect()->route("purchasev.index")
            ->with("mensaje",  $mensaje)
            ->with("tipo", $tipo);

        //return $this->index();

    }

*/




    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->content = $request->content;
        $product->price = $request->price;
        $product->buying_price = $request->buying_price;
        $product->utility = $request->utility;
        //$product->admission = $request->admission;
        //$product->expiration = $request->expiration;

        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $product->featured = $destinationPath . $filename;
        }
        $product->save();
        return redirect()->back();
    }

    public function inventory(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->content = $request->content;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->inventory = $request->inventory;
        $product->admission = $request->admission;
        $product->expiration = $request->expiration;

        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $product->featured = $destinationPath . $filename;
        }
        $product->save();
        return redirect()->back();
    }

    public function delete(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->delete();
        return redirect()->back();
    }
}
