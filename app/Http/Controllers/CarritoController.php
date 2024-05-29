<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Descuento;
use App\Models\Deseo;
use App\Models\Inventario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\talla;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use SebastianBergmann\Environment\Console;
use Spatie\Activitylog\Contracts\Activity;

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyCliente');
    }

    public function index()
    {
        $user = User::all();
        $deseo = Deseo::all();
        $producto = Producto::all();
        $inventario = Inventario::all();
        $marca = Marca::all();
        $descuento = Descuento::all();
        $talla = talla::all();
        $carrito = Carrito::all();
        return view('carritos.index', compact('user', 'deseo', 'producto', 'inventario', 'marca', 'descuento', 'talla', 'carrito'));
    }

    public function store(Request $request)
    {
        $carrito = new Carrito();
        #<-- $carrito->cantidad = $request->cantidad; 
        $carrito->cantidad = 1;
        $carrito->id_user = $request->id_user;
        $carrito->id_producto = $request->id_producto;
        $carrito->save();
        return redirect()->route('catalogos.index');
    }

    public function destroy(string $id)
    {
        $carrito = Carrito::find($id);
        $carrito->delete();
        return redirect('/carritos');
    }

}
