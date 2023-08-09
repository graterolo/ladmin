<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\ProdCategoria;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class ProdCategoriaController extends Controller
{
     
    public function index()
    {  //dd('hit');
        $eid = auth()->user()->empresa_id;
        $prodcategorias = Prodcategoria::select('prod_categorias.id', 'prod_categorias.codigo', 
        'prod_categorias.name', 'prod_categorias.descripcion', 'prod_categorias.empresa_id', 'empresas.name as empresa')
        ->join('empresas', 'empresas.id', '=', 'prod_categorias.empresa_id')
        ->where('prod_categorias.empresa_id', '=', $eid)
        ->paginate(5);
       
        $empresas = Empresa::all();
        return Inertia::render('Prod-categorias/Index', ['prodcategorias' => $prodcategorias,
        'empresas' => $empresas]);
       
    }

   
    public function create()
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-categorias/Create', ['empresas' => $empresas]);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|max:10',
            'name' => [
                'required',
                Rule::unique('prod_categorias')->where(function ($query) use ($request) {
                    return $query->where('empresa_id', $request->empresa_id);
                }),
            ],
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ],['name.unique' => 'El nombre de la categoria ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
        ]); 
        $prodcategoria = ProdCategoria::create([
            'codigo'     => $request->input('codigo'),
            'name'      => $request->input('name'),   
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
            'user_id'   => auth()->user()->id,
        ]);       
        //$prodcategoria = new ProdCategoria($request->input());
        $prodcategoria->save();
        return redirect('prod-categorias')->with('message', 'La categoria se ha creado satisfactoriamente');
    }

    
    public function show(ProdCategoria $prodCategoria)
    {
        $eid = $prodCategoria->empresa_id;
        $empresa = Empresa::find($eid);
        
        return Inertia::render('Prod-categorias/Show', ['prodcategoria' => $prodCategoria,
        'empresa' => $empresa ]);
    }

    
    public function edit(ProdCategoria $prodCategoria)
    {   $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        return Inertia::render('Prod-categorias/Edit', ['prodcategoria' => $prodCategoria, 
        'empresas' => $empresas]);
    }

    
    public function update(Request $request, ProdCategoria $prodCategoria)
    { //dd('hit');
        $request->validate([
            'codigo' => 'required|max:10',
            'name' => [
                'required',
                Rule::unique('prod_categorias')->where(function ($query) use ($prodCategoria) {
                    return $query->where('empresa_id', $prodCategoria->empresa_id);
                })->ignore($prodCategoria->id),
            ],
            'descripcion' => 'required',
            'empresa_id' => 'required|numeric',          
        ]);
        $prodCategoria->update([
            'codigo'     => $request->input('codigo'),
            'name'      => $request->input('name'),   
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
            'user_id'   => auth()->user()->id,
        ], ['name.unique' => 'El nombre de la categoria ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
        ]);
        return redirect('prod-categorias')->with('message', 'La categoria fue editada satisfactoriamente');
    }

   
    public function destroy(ProdCategoria $prodCategoria)
    {
        $prodCategoria->delete();
        return redirect('prod-categorias');
    }
}
