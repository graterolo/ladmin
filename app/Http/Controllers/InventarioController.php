<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Inventario;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\InvDeposito;
use App\Models\InventarioDet;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class InventarioController extends Controller
{
    
    public function index()
    {
        $eid = auth()->user()->empresa_id;
        $inventarios = Inventario::select('inventarios.id', 'inventarios.producto_id', 'inventarios.deposito_id', 
        'inventarios.cantidad', 'inventarios.limite_stock', 'inventarios.empresa_id', 'productos.name as producto', 
         'inv_depositos.name as deposito')
        ->join('productos', 'productos.id', '=', 'inventarios.producto_id')
        ->join('inv_depositos', 'inv_depositos.id', '=', 'inventarios.deposito_id')
        ->where('inventarios.empresa_id', '=', $eid)
        ->orderBy('productos.name','ASC')
        ->paginate(5);
       
        return Inertia::render('Inventarios/Index', ['inventarios' => $inventarios]);
    }

    public function create()
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        $depositos = InvDeposito::select('inv_depositos.id', 'inv_depositos.name')->where('inv_depositos.empresa_id', '=', $eid)->get();
        $productos = Producto::select('productos.id', 'productos.name')->where('productos.empresa_id', '=', $eid)->get();
        return Inertia::render('Inventarios/Create', [
            'empresas' => $empresas,
            'productos' => $productos,
            'depositos' => $depositos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([  
            'empresa_id' => 'required|numeric',
            'deposito_id' => 'required|numeric',
            'producto_id' => [
                'required',
                Rule::unique('inventarios')->where(function ($query) use ($request) {
                    return $query->where('empresa_id', $request->empresa_id)
                                 ->where('deposito_id', $request->deposito_id);
                }),
            ],
            'activo' => 'required|numeric',
            'limite_stock' => 'required|numeric',
        ], [
            'producto_id.unique' => 'Ya existe un inventario para esta empresa, producto y depósito.',         
        ]); 
      
        $inventario = Inventario::create([
            'empresa_id'      => $request->input('empresa_id'),   
            'deposito_id' => $request->input('deposito_id'),
            'producto_id' => $request->input('producto_id'),
            'cantidad' => 0,
            'activo' => $request->input('activo'),
            'limite_stock' => $request->input('limite_stock'),
            'user_id'   => auth()->user()->id,
        ]);       
        $inventario->save();
        return redirect('inventarios')->with('success', 'El inventario ha sido creado correctamente.');
    }

    public function show(Inventario $inventario)
    {
        $eid = $inventario->empresa_id;
        $empresa = Empresa::find($eid);
        $did = $inventario->deposito_id;
        $deposito = InvDeposito::find($did);
        $pid = $inventario->producto_id;
        $producto = Producto::find($pid);

        $iid = $inventario->id;

        $dets = InventarioDet::select('inventario_dets.id', 'inventario_dets.inventario_id', 'inventario_dets.fvence', 
        'inventario_dets.lote', 'inventario_dets.cantidad')
        ->where('inventario_dets.inventario_id', '=', $iid)
        ->orderBy('inventario_dets.id','DESC')
        ->paginate(5);
    
        return Inertia::render('Inventarios/Show', ['inventario' => $inventario,
        'empresa' => $empresa,
        'deposito' => $deposito,
        'producto' => $producto,
        'dets' => $dets,
    ]);
        
    }

    public function edit(Inventario $inventario)
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        $depositos = InvDeposito::select('inv_depositos.id', 'inv_depositos.name')->where('inv_depositos.empresa_id', '=', $eid)->get();
        $productos = Producto::select('productos.id', 'productos.name')->where('productos.empresa_id', '=', $eid)->get();
        return Inertia::render('Inventarios/Edit', [ 'inventario' => $inventario,
            'empresas' => $empresas, 
            'productos' => $productos,
            'depositos' => $depositos
        ]);
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([  
            'empresa_id' => 'required|numeric',
            'deposito_id' => 'required|numeric',
            'producto_id' => [
                'required',
                Rule::unique('inventarios')->where(function ($query) use ($request, $inventario) {
                    return $query->where('empresa_id', $request->empresa_id)
                                 ->where('deposito_id', $request->deposito_id)
                                 ->where('id', '!=', $inventario->id);
                }),
            ],
            'cantidad' => 'required|numeric',
            'activo' => 'required|numeric',
            'limite_stock' => 'required|numeric',
        ], [
            'producto_id.unique' => 'Ya existe un inventario para esta empresa, producto y depósito.',         
        ]); 
        $inventario->update($request->all());
        $inventario->update(['user_id'   => auth()->user()->id]);
        $inventario->save();
        return redirect('inventarios')->with('success', 'El inventario ha sido actualizado correctamente.');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect('inventarios');
    }
}
