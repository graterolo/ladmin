<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\InvDeposito;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class InvDepositoController extends Controller
{
    
    public function index()
    {   $eid = auth()->user()->empresa_id;
        $invdepositos = InvDeposito::select('inv_depositos.id', 'inv_depositos.name', 'inv_depositos.acronimo', 
        'inv_depositos.tipo', 'inv_depositos.condicion', 'inv_depositos.empresa_id', 'empresas.name as empresa', 
         'inv_depositos.user_id', 'users.name as usuario')
        ->join('empresas', 'empresas.id', '=', 'inv_depositos.empresa_id')
        ->join('users', 'users.id', '=', 'inv_depositos.user_id')
        ->where('inv_depositos.empresa_id', '=', $eid)
        ->orderBy('inv_depositos.name','ASC')
        ->paginate(5);
       
        return Inertia::render('Inv-depositos/Index', ['invdepositos' => $invdepositos]);
    }

    
    public function create()
    {   
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Inv-depositos/Create', [
            'empresas' => $empresas
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            //'name' => 'required|max:50',
            'name' => [
                'required', 'max:50',
                Rule::unique('inv_depositos')->where(function ($query) use ($request) {
                    return $query->where('empresa_id', $request->empresa_id);
                }),
            ],
            'acronimo' => 'required|max:20',
            'tipo' => 'required',
            'condicion' => 'required',  
            'empresa_id' => 'required|numeric'          
        ], ['name.unique' => 'El nombre del depósito ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]); 
        $invdeposito = InvDeposito::create([
            'name'     => $request->input('name'),
            'acronimo'      => $request->input('acronimo'),   
            'tipo' => $request->input('tipo'),
            'condicion' => $request->input('condicion'),
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
            'user_id'   => auth()->user()->id,
        ]);       
        $invdeposito->save();
        return redirect('inv-depositos')->with('message', 'El depóosito se ha creado satisfactoriamente');
    }

    
    public function show(InvDeposito $invDeposito)
    {  $eid = $invDeposito->empresa_id;
        $empresa = Empresa::find($eid);
    //     dd($empresa);
    
        return Inertia::render('Inv-depositos/Show', ['invdeposito' => $invDeposito,
        'empresa' => $empresa ]);
        
    }

   
    public function edit(InvDeposito $invDeposito)
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Inv-depositos/Edit', ['invdeposito' => $invDeposito, 
        'empresas' => $empresas]);
    }

    
    public function update(Request $request, InvDeposito $invDeposito)
    {
        $request->validate([
            'name' => [
                'required', 'max:50',
                Rule::unique('inv_depositos')->where(function ($query) use ($invDeposito) {
                    return $query->where('empresa_id', $invDeposito->empresa_id);
                })->ignore($invDeposito->id),
            ],
            'acronimo' => 'required|max:20',
            'tipo' => 'required',
            'condicion' => 'required',  
            'empresa_id' => 'required|numeric'            
        ], ['name.unique' => 'El nombre del depósito ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]);
        $invDeposito->update($request->all());
        $invDeposito->update(['user_id'   => auth()->user()->id]);
        $invDeposito->save();
        return redirect('inv-depositos')->with('message', 'El depóosito se ha editado satisfactoriamente');
    }

    
    public function destroy(InvDeposito $invDeposito)
    {
        $invDeposito->delete();
        return redirect('inv-depositos');
    }
}
