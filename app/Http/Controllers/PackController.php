<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packs = Pack::all();
        return view('packs/index',[
            'packs' => $packs,
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
        $servicios = Service::all();
        return view('packs/crear',[
            'servicios' => $servicios
        ]);
        
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
            'nombre'=>'required',
            'contenido' =>'required',
            'servicio_id' => 'required',
            'precio' => 'required',
            'image' => 'required'
        ],[
            'image.required' => 'Tienes que introducir una imagen.',
        ]);

        $image = $request->file('image');

        $nombreArchivo = 'pack_'.$datos['nombre'].'_'.time().'.'.$image->getClientOriginalExtension();


        if ($request->hasFile('image')) {
            $image->move(public_path('img'), $nombreArchivo);
        }

        $datos['image'] = $nombreArchivo;

        Pack::create($datos);

        return redirect()->route('pack.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $servicios = Service::all();
        $pack = Pack::findOrFail($id);

        return view('packs/editar',[
            'pack' => $pack,
            'servicios' => $servicios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos = $request->validate([
            'nombre'=>'required',
            'contenido' =>'required',
            'servicio_id' => 'required',
            'precio' => 'required',
        ]);

        $pack = Pack::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nombreArchivo = 'pack_'.$datos['nombre'].'_'.time().'.'.$image->getClientOriginalExtension();
            //Borrar antigua imagen por si acaso
            $rutaArchivo = public_path('img') . '/' . $pack->image;
            unlink($rutaArchivo);    
            // Movemos la nueva imagen s
            $image->move(public_path('img'), $nombreArchivo);
                
            $datos['image'] = $nombreArchivo;
        }


        $pack->update($datos);

        return redirect()->route('pack.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pack = Pack::find($id);
        $pack->delete();
    }
}
