<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpresaController extends Controller
{
    //public function __constructor() {
    //     $this->middleware('can:empresas.index')->only('index');
    //     $this->middleware('can:empresas.create')->only('create');
    //     $this->middleware('can:empresas.edit')->only('edit');
    //     $this->middleware('can:empresas.destroy')->only('destroy');

       // $this->middleware('auth');
       // $this->middleware('permission:empresas.index')->only('index');
       // $this->middleware('role:admin')->only('edit');
   // }
    public function index(){ //dd('hit');
        $eid = auth()->user()->empresa_id;
        // return Inertia::render('Empresas/Index', [
        //     'empresas' => Empresa::paginate(5)
        // ]);
        return Inertia::render('Empresas/Index', [
            'empresas' => Empresa::where('id', '=', $eid)
            ->paginate(5)
        ]);
      
    }
    public function create(){
       // $tipo = 1;
       // $empresas = Empresa::where('tipo', '=', $tipo);
        $empresas = Empresa::all();
        return Inertia::render('Empresas/Create', [
            'empresas' => $empresas]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => [
                'required',
                Rule::unique('empresas'),
            ],
            'acronimo' => 'required|max:20',
            'rif' => 'required|max:12',
            'telef' => 'required|max:20',
            'direccion' => 'required',
            'email' => 'required|email|unique:empresas',
            'tipo' => 'required',
            
        ], [
            'name.unique' => 'El nombre de la empresa ya existe. Por favor, ingrese un nombre diferente.',
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, ingrese un correo electrónico diferente.',
        ]);
        $empresa = Empresa::create([
            'name'     => $request->input('name'),
            'acronimo'      => $request->input('acronimo'),
            'rif' => $request->input('rif'),
            'telef' => $request->input('telef'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'tipo' => $request->input('tipo'),
            'descripcion' => $request->input('descripcion'),
            'supempresa_id' => $request->input('supempresa_id'),
        ]);
        //$empresa = new Empresa($request->input());
        $empresa->save();
        return redirect('empresas')->with('message', 'La empresa se ha creado satisfactoriamente');
    }
    public function edit(Empresa $empresa){
        $empresas = Empresa::all();
        return Inertia::render('Empresas/Edit', [
            'empresa' => $empresa,
            'empresas' => $empresas]);
    }
    public function update(Request $request, Empresa $empresa){
        $request->validate([
            'name' => [
                'required',
                Rule::unique('empresas')->ignore($empresa->id),
            ],
            'acronimo' => 'required|max:20',
            'rif' => 'required|max:12',
            'telef' => 'required|max:20',
            'direccion' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('empresas')->ignore($empresa->id),
            ],
            'tipo' => 'required|numeric'           
        ], [
            'name.unique' => 'El nombre de la empresa ya existe. Por favor, ingrese un nombre diferente.',
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, ingrese un correo electrónico diferente.',
        ]);
        $empresa->update($request->all());
        return redirect('empresas')->with('message', 'La empresa se ha editado satisfactoriamente');
    }
    public function destroy(Empresa $empresa){
        $empresa->delete();
        return redirect('empresas');
    }
    public function show(Empresa $empresa){
        $eid = $empresa->supempresa_id;
        $supempresa = Empresa::find($eid);
        return Inertia::render('Empresas/Show', [
            'empresa' => $empresa,
            'supempresa' => $supempresa]);
    }

}
