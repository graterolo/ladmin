<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\ProdUnidad;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class ProdUnidadController extends Controller
{
    
    public function index()
    {   $eid = auth()->user()->empresa_id;
        $produnidads = prodUnidad::select('prod_unidads.id', 'prod_unidads.name', 
        'prod_unidads.descripcion', 'prod_unidads.empresa_id', 'prod_unidads.created_at', 'empresas.name as empresa')
        ->join('empresas', 'empresas.id', '=', 'prod_unidads.empresa_id')
        ->where('prod_unidads.empresa_id', '=', $eid)
        ->paginate(5);
       
        $empresas = Empresa::all();
        return Inertia::render('Prod-unidads/Index', ['produnidads' => $produnidads,
        'empresas' => $empresas]);
    }

    
    public function create()
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-unidads/Create', ['empresas' => $empresas]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('prod_unidads')->where(function ($query) use ($request) {
                    return $query->where('empresa_id', $request->empresa_id);
                }),
            ],
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ], ['name.unique' => 'El nombre de la unidad ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]);
        $produnidad = new ProdUnidad($request->input());
        $produnidad->save();
        return redirect('prod-unidads')->with('message', 'La unidad se ha creado satisfactoriamente');
    }

    
    public function show(ProdUnidad $prodUnidad)
    {
        $eid = $prodUnidad->empresa_id;
        $empresa = Empresa::find($eid);
        
        return Inertia::render('Prod-unidads/Show', ['produnidad' => $prodUnidad,
        'empresa' => $empresa ]);
    }

    
    public function edit(ProdUnidad $prodUnidad)
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-unidads/Edit', ['produnidad' => $prodUnidad, 
        'empresas' => $empresas]);
    }

    
    public function update(Request $request, ProdUnidad $prodUnidad)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('prod_unidads')->where(function ($query) use ($prodUnidad) {
                    return $query->where('empresa_id', $prodUnidad->empresa_id);
                })->ignore($prodUnidad->id),
            ],
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ], ['name.unique' => 'El nombre de la unidad ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]);
        $prodUnidad->update($request->all());
        return redirect('prod-unidads')->with('message', 'La unidad fue editada satisfactoriamente');
    }

    
    public function destroy(ProdUnidad $prodUnidad)
    {
        $prodUnidad->delete();
        return redirect('prod-unidads');
    }
}
