<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galerias = Galeria::all();

        return view('galeria/listar',[
            'galerias' => $galerias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('galeria/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = $request->validate([
            'nombre' => 'required',
            'image' => 'required',
        ], [
            'image.required' => 'Tienes que introducir una imagen.',
        ], [
            'image' => 'imagen'
        ]);

        $image = $request->file('image');

        $nombreArchivo = 'galeria_' . $datos['nombre'] . '_' . time() . '.' . $image->getClientOriginalExtension();


        if ($request->hasFile('image')) {
            $image->move(public_path('img'), $nombreArchivo);
        }

        $datos['image'] = $nombreArchivo;

        Galeria::create($datos);

        return redirect()->route('galeria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return view('galeria/fotos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        //
    }
}
