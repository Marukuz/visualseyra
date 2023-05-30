<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Pack;
use App\Models\User;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packsb = Pack::where('servicio_id','1')->get();
        $packsc = Pack::where('servicio_id','2')->get();
        $servicios = Service::all();
        return view('servicios/index',[
            'packsb' => $packsb,
            'packsc' => $packsc,
            'servicios' => $servicios,
        ]);
    }

    public function indexAdmin(){
        $servicios = Service::all();

        return view('servicios/listar', [
            'servicios' => $servicios
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
        return view('servicios/crear');
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
        ]);
        
        Service::create($datos);

        return redirect()->route('servicio.listar');
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
        $servicio = Service::findOrFail($id);

        return view('servicios/editar',[
            'servicio' => $servicio
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
        ]);

        $servicio = Service::find($id);

        $servicio->update($datos);

        return redirect()->route('servicio.listar');
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
        $servicio = Service::find($id);
        $servicio->delete();
        
    }
}
