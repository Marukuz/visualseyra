<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Images;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Middleware\Admin;


class GaleriaController extends Controller
{

    public function __construct()
    {
        $this->middleware(Admin::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galerias = Galeria::all();

        return view('galeria/listar', [
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

        $compressedImage = Image::make($image)
            ->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);

        $compressedImage->save(public_path('img/' . $nombreArchivo));


        $datos['image'] = $nombreArchivo;

        Galeria::create($datos);

        return redirect()->route('galeria.index');
    }

    public function addFoto($id)
    {

        $galeria = Galeria::findOrFail($id)->get();

        return view('images/crear', [
            'galeria' => $galeria,
        ]);
    }

    public function storeFoto(Request $request, $id)
    {
        $datos = $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'Tienes que introducir una imagen.',
        ], [
            'image' => 'imagen'
        ]);

        $galeria = Galeria::findOrFail($id);
        $images = $request->file('image');

        if (is_array($images)) {
            foreach ($images as $index => $image) {
                $nombreArchivo = 'fotos_' . $galeria->nombre . '_' . time() . '_' . $index . '.' . $image->getClientOriginalExtension();

                $compressedImage = Image::make($image)
                    ->resize(null, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg', 80);

                $compressedImage->save(public_path('img/' . $nombreArchivo));

                $imagenDatos = [
                    'image' => $nombreArchivo,
                    'galeria_id' => $galeria->id
                ];

                Images::create($imagenDatos);
            }
        } else {
            $nombreArchivo = 'fotos_' . $galeria->nombre . '_' . time() . '.' . $images->getClientOriginalExtension();
            $compressedImage = Image::make($images)
                ->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80);

            $compressedImage->save(public_path('img/' . $nombreArchivo));

            $datos['image'] = $nombreArchivo;
            $datos['galeria_id'] = $galeria->id;

            Images::create($datos);
        }

        return redirect()->route('galeria.index');
    }


    public function showFotos($id)
    {

        $fotos = Images::where('galeria_id', $id)->get();

        return view('galeria/fotos', [
            'fotos' => $fotos
        ]);
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
    public function destroy($id)
    {
        //
        $galeria = Galeria::find($id);
        $galeria->delete();
    }
}
