<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Empresa;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    // public function __constructor() {
    //     $this->middleware('can:users.index')->only('index');
    // }
    public function index()
    {   $eid = auth()->user()->empresa_id;
        return Inertia::render('Users/Index', [
            'users' => User::where('empresa_id', '=', $eid)
            ->paginate(5)
        ]);
    }

    public function create(): Response
    {   $empresas = Empresa::all();
        return Inertia::render('Users/Create', [
            'empresas' => $empresas
        ]);
    }
    public function store(Request $request)
    {   //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:25|unique:'.User::class,
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'empresa_id' => 'required|numeric',
            'activo' => 'required|numeric',

            
        ], [
            'username.unique' => 'El nombre de usuario ya existe. Por favor, ingrese un nombre diferente.',
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, ingrese un correo electrónico diferente.',
        ]);
         $eid = $request->empresa_id;
   
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'empresa_id' => $request->empresa_id,
            'activo' => $request->activo,           
        ]);

        $user->save();
        return redirect('users')->with('message', 'El usuario se ha creado satisfactoriamente');
    }
    public function edit(User $user){
        $empresas = Empresa::all();
        return Inertia::render('Users/Edit', ['user' => $user,
        'empresas' => $empresas
        ]);
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'empresa_id' => 'required|numeric',
            'activo' => 'required|numeric',            
        ], [
            'username.unique' => 'El nombre de usuario ya existe. Por favor, ingrese un nombre diferente.',
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, ingrese un correo electrónico diferente.',
        ]);
        //$user->update($request->all());
        $user->update([
            'name'   => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'empresa_id' => $request->empresa_id,
            'activo' => $request->activo
        ]);
        $user->save();
        return redirect('users')->with('message', 'El usuario se ha editado satisfactoriamente');;
    }
    public function show(User $user)
    {  $eid = $user->empresa_id;
        $empresa = Empresa::find($eid);
    
        return Inertia::render('Users/Show', ['user' => $user,
        'empresa' => $empresa ]);
        
    }
}
