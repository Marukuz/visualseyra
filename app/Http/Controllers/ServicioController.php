<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Pack;
use App\Models\Event;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Http\Middleware\Admin;

class ServicioController extends Controller
{

    public function __construct()
    {
        $this->middleware(Admin::class)->except(['index', 'showPacks']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packsb = Pack::where('servicio_id', '1')->get();
        $packsc = Pack::where('servicio_id', '2')->get();
        $servicios = Service::all();
        return view('servicios/index', [
            'packsb' => $packsb,
            'packsc' => $packsc,
            'servicios' => $servicios,
        ]);
    }

    public function indexAdmin()
    {
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'image' => 'required',
        ], [
            'image.required' => 'Tienes que introducir una imagen.',
        ], [
            'image' => 'imagen'
        ]);

        $image = $request->file('image');

        $nombreArchivo = 'pack_' . $datos['nombre'] . '_' . time() . '.' . $image->getClientOriginalExtension();


        $compressedImage = Image::make($image)
            ->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);

        $compressedImage->save(public_path('img/' . $nombreArchivo));

        $datos['image'] = $nombreArchivo;

        Service::create($datos);

        return redirect()->route('servicio.listar');
    }

    public function showPacks($id)
    {
        $packs = Pack::where('servicio_id', $id)->get();

        $fechasBloqueadas = Event::select('fecha', 'end')->get();

        $fechasBloqueadasFlatpickr = $fechasBloqueadas->map(function ($evento) {
            $start = Carbon::parse($evento->fecha)->format('Y-m-d H:i');
            $end = Carbon::parse($evento->end)->format('Y-m-d H:i');

            return [
                'from' => $start,
                'to' => $end,
            ];
        })->toJson();

        return view('servicios.packs', [
            'packs' => $packs,
            'fechasBloqueadasFlatpickr' => $fechasBloqueadasFlatpickr,
        ]);
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

        return view('servicios/editar', [
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
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $servicio = Service::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $nombreArchivo = 'pack_' . $datos['nombre'] . '_' . time() . '.' . $image->getClientOriginalExtension();

            $compressedImage = Image::make($image)
                ->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80);

            //Borrar antigua imagen por si acaso
            $rutaArchivo = public_path('img') . '/' . $servicio->image;
            unlink($rutaArchivo);
            // Movemos la nueva imagen 
            $compressedImage->save(public_path('img/' . $nombreArchivo));

            $datos['image'] = $nombreArchivo;
        }

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
