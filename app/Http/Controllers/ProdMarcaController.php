<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\ProdMarca;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class ProdMarcaController extends Controller
{
    
    public function index()
    {   $eid = auth()->user()->empresa_id;
        $prodmarcas = Prodmarca::select('prod_marcas.id', 'prod_marcas.name', 
        'prod_marcas.supervisado', 'prod_marcas.descripcion', 'prod_marcas.empresa_id', 'empresas.name as empresa')
        ->join('empresas', 'empresas.id', '=', 'prod_marcas.empresa_id')
        ->where('prod_marcas.empresa_id', '=', $eid)
        ->paginate(5);
       
        $empresas = Empresa::all();
        return Inertia::render('Prod-marcas/Index', ['prodmarcas' => $prodmarcas,
        'empresas' => $empresas]);
    }

   
    public function create()
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-marcas/Create', ['empresas' => $empresas]);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('prod_marcas')->where(function ($query) use ($request) {
                    return $query->where('empresa_id', $request->empresa_id);
                }),
            ],
            'supervisado' => 'required',
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ], ['name.unique' => 'El nombre de la marca ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]);
        $prodmarca = new ProdMarca($request->input());
        $prodmarca->save();
        return redirect('prod-marcas')->with('message', 'La marca se ha creado satisfactoriamente');
    }

   
    public function show(ProdMarca $prodMarca)
    {
        $eid = $prodMarca->empresa_id;
        $empresa = Empresa::find($eid);
        
        return Inertia::render('Prod-marcas/Show', ['prodmarca' => $prodMarca,
        'empresa' => $empresa ]);
    }

    
    public function edit(ProdMarca $prodMarca)
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-marcas/Edit', ['prodmarca' => $prodMarca, 'empresas' => $empresas]);
    }

    
    public function update(Request $request, ProdMarca $prodMarca)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('prod_marcas')->where(function ($query) use ($prodMarca) {
                    return $query->where('empresa_id', $prodMarca->empresa_id);
                })->ignore($prodMarca->id),
            ],
            'supervisado' => 'required',
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ], ['name.unique' => 'El nombre de la marca ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
    ]);
        $prodMarca->update($request->all());
        return redirect('prod-marcas')->with('message', 'La marca fue editada satisfactoriamente');
    }

    
    public function destroy(ProdMarca $prodMarca)
    {
        $prodMarca->delete();
        return redirect('prod-marcas');
    }
}
