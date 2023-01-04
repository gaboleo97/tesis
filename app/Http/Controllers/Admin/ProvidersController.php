<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index() {
        // dd(\App\Models\Category::all());
        $providers = Provider::all();// seleccionar las categorias se encapsulan en la variable $providers
         return view('admin.providers.index', ['providers' => $providers]);//pasar las categorias a la vista
     }

     public function store(Request $request) {
         //dd(\App\Models\Category::all());
         //Category::create([
          //   'name' => $request->category
        // ]);
        $newProvider = new Provider();

             $newProvider->name = $request->name;
             $newProvider->business = $request->business;
             $newProvider->description = $request->description;
             $newProvider->brand = $request->brand;
             $newProvider->phone = $request->phone;
             $newProvider->distribution_days = implode(' , ', $request->distribution_days);
             $newProvider->dispatch_times = $request->dispatch_times;
             $newProvider->paydays = implode(' , ', $request->paydays);
             $newProvider->save(); // save() para guardar el objeto

         //dd($request->category); // para traer informacion especifica del form desde el atributo name
         //dd($request->all()); //para traer toda la info del form
         //echo "Categoria $newProvider->name ha sido creada con exito";
         //return view('admin.categories.index');
         return redirect()->back(); //para redirigir a la vista anterior
     }

     public function update(Request $request, $providerId) {
         $provider = Provider::find($providerId);
         $provider->name = $request->name;
         $provider->business = $request->business;
         $provider->description = $request->description;
         $provider->brand = $request->brand;
         $provider->phone = $request->phone;
         $provider->distribution_days = implode(' , ', $request->distribution_days);
         $provider->dispatch_times = $request->dispatch_times;
         $provider->paydays = implode(' , ', $request->paydays);

         $provider->save();
         return redirect()->back();
     }

     public function delete(Request $request, $providerId) {
         $provider = Provider::find($providerId);
         $provider->delete();
         return redirect()->back();
     }

}
