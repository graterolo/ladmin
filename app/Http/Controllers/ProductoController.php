<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\ProdCategoria;
use App\Models\ProdMarca;
use App\Models\ProdUnidad;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class ProductoController extends Controller
{
   
    public function index()
    {   $eid = auth()->user()->empresa_id;
        $productos = Producto::select('productos.id', 'productos.name', 'productos.url_img', 
        'productos.serial', 'productos.marca_id', 'productos.empresa_id', 
        'empresas.name as empresa', 'prod_marcas.name as marca')
        ->join('empresas', 'empresas.id', '=', 'productos.empresa_id')
        ->join('prod_marcas', 'prod_marcas.id', '=', 'productos.marca_id')
        ->where('productos.empresa_id', '=', $eid)
        ->orderBy('productos.name','ASC')
        ->paginate(5);
       
        $empresas = Empresa::all();
        $prod_marcas = ProdMarca::all();
        return Inertia::render('Productos/Index', ['productos' => $productos,
        'empresas' => $empresas, 'marcas' => $prod_marcas]);
    }

   
    public function create()
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        $prodcategorias = ProdCategoria::select('prod_categorias.id', 'prod_categorias.name')->where('prod_categorias.empresa_id', '=', $eid)->get();
        $prodmarcas = ProdMarca::select('prod_marcas.id', 'prod_marcas.name')->where('prod_marcas.empresa_id', '=', $eid)->get();
        $produnidads = ProdUnidad::select('prod_unidads.id', 'prod_unidads.name')->where('prod_unidads.empresa_id', '=', $eid)->get();

        return Inertia::render('Productos/Create', [
            'empresas' => $empresas,
            'categorias' => $prodcategorias,
            'marcas' => $prodmarcas,
            'unidads' => $produnidads
        ]);
    }

    
    public function store(Request $request)
    { 
        $request->validate([
           'name' => [
            'required',
            Rule::unique('productos')->where(function ($query) use ($request) {
                return $query->where('empresa_id', $request->empresa_id);
            }),
        ],
           'serial' => [
            'required',
            Rule::unique('productos')->where(function ($query) use ($request) {
                return $query->where('empresa_id', $request->empresa_id);
            }),
        ],
            'categoria_id' => 'required|numeric',
            'unidad_id' => 'required|numeric',  
            'marca_id' => 'required|numeric',
            'activo' => 'required',
            'costo' => 'required|numeric',
            'utilidad1' => 'required|numeric', 
            'precio1' => 'required|numeric',
            'exento' => 'required|numeric',   
            'empresa_id' => 'required|numeric',          
        ], ['name.unique' => 'El nombre del producto ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
            'serial.unique' => 'El serial del producto ya existe para esta empresa. Por favor, ingrese un serial diferente.',
        ]); 
        $urlimg = "/images/productos/no-product.png";
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $url = 'images/productos/';
            $filename = time().'_'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url, $filename);
            $urlimg = "/". $url . $filename;
        }
        $producto = Producto::create([
            'name'     => $request->input('name'),
            'serial'      => $request->input('serial'),
            'categoria_id' => $request->input('categoria_id'),
            'unidad_id' => $request->input('unidad_id'),
            'marca_id' => $request->input('marca_id'),
            'activo' => $request->input('activo'),
            'costo' => $request->input('costo'),
            'utilidad1' => $request->input('utilidad1'),
            'utilidad2' => $request->input('utilidad2'),
            'utilidad3' => $request->input('utilidad3'),
            'utilidad4' => $request->input('utilidad4'),
            'precio1' => $request->input('precio1'),
            'precio2' => $request->input('precio2'),
            'precio3' => $request->input('precio3'),
            'precio4' => $request->input('precio4'),
            'exento' => $request->input('exento'),
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
            'url_img' => $urlimg,
            'user_id'   => auth()->user()->id,
        ]);       
        $producto->save();
        return redirect('productos')->with('message', 'Producto creado satisfactoriamente');
    }

    
    public function show(Producto $producto)
    {   $cid = $producto->categoria_id;
        $categoria = ProdCategoria::find($cid);
        $mid = $producto->marca_id;
        $marca = ProdMarca::find($mid);
        $uid = $producto->unidad_id;
        $unidad = ProdUnidad::find($uid);
        $eid = $producto->empresa_id;
        $empresa = Empresa::find($eid);

        return Inertia::render('Productos/Show', ['producto' => $producto,
            'categoria' => $categoria,
            'marca' => $marca,
            'unidad' => $unidad,
            'empresa' => $empresa ]);

    }

    
    public function edit(Producto $producto)
    {
        $eid = auth()->user()->empresa_id;
        $empresas = Empresa::select('empresas.id', 'empresas.name')->where('empresas.id', '=', $eid)->get();
        $categorias = ProdCategoria::select('prod_categorias.id', 'prod_categorias.name')->where('prod_categorias.empresa_id', '=', $eid)->get();
        $marcas = ProdMarca::select('prod_marcas.id', 'prod_marcas.name')->where('prod_marcas.empresa_id', '=', $eid)->get();
        $unidads = ProdUnidad::select('prod_unidads.id', 'prod_unidads.name')->where('prod_unidads.empresa_id', '=', $eid)->get();
        return Inertia::render('Productos/Edit', ['producto' => $producto, 
            'empresas' => $empresas,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'unidads' => $unidads,
        
        ]);
    }

    
    public function update(Request $request, Producto $producto)
    {   
        $pid = $producto->id;
        $producto = Producto::findOrFail($pid);
        $request->validate([
            'name' => [
                'required',
                Rule::unique('productos')->where(function ($query) use ($producto) {
                    return $query->where('empresa_id', $producto->empresa_id);
                })->ignore($producto->id),
            ],
            'serial' => [
                'required',
                Rule::unique('productos')->where(function ($query) use ($producto) {
                    return $query->where('empresa_id', $producto->empresa_id);
                })->ignore($producto->id),
            ],
            'categoria_id' => 'required|numeric',
            'unidad_id' => 'required|numeric',  
            'marca_id' => 'required|numeric',
            'activo' => 'required',
            'costo' => 'required|numeric',
            'utilidad1' => 'required|numeric', 
            'precio1' => 'required|numeric',
            'exento' => 'required|numeric',   
            'empresa_id' => 'required|numeric',           
        ], ['name.unique' => 'El nombre del producto ya existe para esta empresa. Por favor, ingrese un nombre diferente.',
            'serial.unique' => 'El serial del producto ya existe para esta empresa. Por favor, ingrese un serial diferente.',
        ]);
        $urlimg = $request->input('url_img');
        // if($urlimg != '/images/productos/no-product.png'){
        //     Storage::delete('public'.$urlimg);
        // }
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $url = 'images/productos/';
            $filename = time().'_'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url, $filename);
            $urlimg = "/". $url . $filename;
        }
        $producto->update([
            'name'     => $request->input('name'),
            'serial'      => $request->input('serial'),
            'categoria_id' => $request->input('categoria_id'),
            'unidad_id' => $request->input('unidad_id'),
            'marca_id' => $request->input('marca_id'),
            'activo' => $request->input('activo'),
            'costo' => $request->input('costo'),
            'utilidad1' => $request->input('utilidad1'),
            'utilidad2' => $request->input('utilidad2'),
            'utilidad3' => $request->input('utilidad3'),
            'utilidad4' => $request->input('utilidad4'),
            'precio1' => $request->input('precio1'),
            'precio2' => $request->input('precio2'),
            'precio3' => $request->input('precio3'),
            'precio4' => $request->input('precio4'),
            'exento' => $request->input('exento'),
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
            'url_img' => $urlimg,
            'user_id'   => auth()->user()->id,
        ]);       

        //$producto->update(['user_id'   => auth()->user()->id]);
        $producto->save();
        return redirect('productos')->with('success', 'El producto ha sido actualizado correctamente.');
    }

    
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect('productos');
    }
}
