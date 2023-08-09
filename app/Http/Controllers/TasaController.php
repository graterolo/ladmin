<?php
namespace App\Http\Controllers;

use App\Models\Tasa;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class TasaController extends Controller
{
    public function index()
    {   $eid = auth()->user()->empresa_id;
        $tasas = Tasa::select('tasas.id', 'tasas.name', 'tasas.valor', 
         'tasas.empresa_id', 'empresas.name as empresa', 
         'tasas.user_id', 'users.name as usuario')
        ->join('empresas', 'empresas.id', '=', 'tasas.empresa_id')
        ->join('users', 'users.id', '=', 'tasas.user_id')
        ->where('tasas.empresa_id', '=', $eid)
        ->orderBy('tasas.id','DESC')
        ->paginate(5);
       
        return Inertia::render('Tasas/Index', ['tasas' => $tasas]);
    }

    
    public function create()
    {
        $empresas = Empresa::all();
        //$empresas = Empresa::select('empresas.id', 'empresas.name');
        return Inertia::render('Tasas/Create', [
            'empresas' => $empresas
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'valor' => 'required|numeric',
            'empresa_id' => 'required|numeric',          
        ]);
        $tasa = Tasa::create([
            'name'     => $request->input('name'),
            'valor'     => $request->input('valor'),
            'empresa_id' => $request->input('empresa_id'),
            'user_id'   => auth()->user()->id
        ]);
        //$tasa = new Tasa($request->input());
        $tasa->save();
        return redirect('tasas');
    }

}
