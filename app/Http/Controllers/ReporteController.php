<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Models\Detalleventa;
use App\Models\Marca;
use App\Models\Notaventa;
use App\Models\Producto;
use App\Models\talla;
use App\Models\User;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index()
    {
        $notaventa = Notaventa::all();
        $detalleventa = Detalleventa::all();
        $producto = Producto::all();
        $marca = Marca::all();
        $descuento = Descuento::all();
        $talla = talla::all();
        $user = User::all();
        return view('reportes.index', compact('notaventa','detalleventa','producto', 'marca', 'descuento', 'talla', 'user'));
    }

    public function show($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        $detalleventa = Detalleventa::all();
        $producto = Producto::all();
        $marca = Marca::all();
        $descuento = Descuento::all();
        $talla = talla::all();
        $user = User::all();
        return view('reportes.show', compact('notaventa','detalleventa','producto', 'marca', 'descuento', 'talla', 'user'));
    }
}
