<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = auth()->user()->productos;
        return view("productos.index", compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required',
            // 'imagen' => 'image|max:4000',
            'precio' => 'required',
        ]);

        $ruta_imagen = '';
        if ($request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-productos', 'public');
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(300, 300);
            $img->save();
        }

        auth()->user()->productos()->create([
            // No es necesario agregar el campo user_id
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'imagen' => $ruta_imagen,
            'precio' => $data['precio'],
        ]);

        return back()->withSuccess('Los datos se guardaron correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $this->authorize('view', $producto);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update', $producto);
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        $producto->titulo = $data['titulo'];
        $producto->descripcion = $data['descripcion'];
        $producto->precio = $data['precio'];

        if (request('imagen')) {
            $ruta_imagen = $request['imagen']->store('upload-productos', 'public');
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();
            $producto->imagen = $ruta_imagen;
        }

        $producto->save();
        return redirect()->route('productos.index')->withSuccess('Los datos se actualizaron correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete', $producto);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
