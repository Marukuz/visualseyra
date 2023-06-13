<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitasUsuario;
use App\Mail\CitasAdmin;
use App\Mail\CitaCancelada;
use App\Mail\CitaCanceladaAdmin;
use Carbon\Carbon;
use App\Http\Middleware\Admin;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware(Admin::class)->except(['showCitaUsuario', 'citaUsuario']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('agenda/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }


    public function showCitaUsuario($id){
        $cita = Event::where('user_id', $id)->first();
    
        $fecha = $cita->formattedFecha = Carbon::parse($cita->start)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $hora  = $cita->formattedHora = Carbon::parse($cita->start)->format('H:i');

        return view('citas.citas', [
            'cita' => $cita,
            'fecha' => $fecha,
            'hora' => $hora
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
        $request->validate(Event::$rules);
    
        $evento = Event::create($request->all());
        
        return response()->json(['success' => true]);
    }
    
    public function citaUsuario(Request $request,$id){
        $datos = $request->validate([
            'start' => 'required',
            
        ], [], [
            'start' => 'fecha'
        ]);

        $pack = Pack::findOrFail($id);

        $datos['title']       = 'Cita '.$pack->nombre.' '. Auth::user()->name;
        $datos['descripcion'] = 'Cita con '.Auth::user()->name.' del '.$pack->nombre. ' sobre el servicio de '.$pack->servicio->nombre;
        $datos['end']         = date('Y-m-d H:i', strtotime($datos['start'] . ' +2 hours'));
        $datetime             = Carbon::parse($datos['start']);
        $dia = $datetime->format('d');
        $mes = $datetime->format('F');
        $hora = $datetime->format('H');
        $minutos = $datetime->format('i');

        $datos['fecha'] = $datetime->setTime(0, 0, 0);

        $user = Auth::user()->name;
        $admins = User::where('tipo', 'Administrador')->get();

        Mail::to(Auth::user()->email)->send(new CitasUsuario($user,$dia,$mes,$hora,$minutos));

        foreach($admins as $admin){
            Mail::to($admin->email)->send(new CitasAdmin($admin->name,$user,$dia,$mes,$hora,$minutos));
        }
        $datos['user_id']     = Auth::user()->id;
        Event::create($datos);
        return redirect()->route('cita.show',Auth::user()->id);
    }

    public function cancelarCita($id){

        $evento   = Event::find($id);
        $datetime = Carbon::parse($evento->start);
        $dia      = $datetime->format('d');
        $mes      = $datetime->format('F');
        $hora     = $datetime->format('H');
        $minutos  = $datetime->format('i');
        $user     = Auth::user()->name;

        Mail::to(Auth::user()->email)->send(new CitaCancelada($user,$dia,$mes,$hora,$minutos));

        $admins = User::where('tipo', 'Administrador')->get();

        foreach($admins as $admin){
            Mail::to($admin->email)->send(new CitaCanceladaAdmin($admin->name,$user,$dia,$mes,$hora,$minutos));
        }

        $evento->delete();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        $evento = Event::all();

        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento = Event::find($id);

        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate(Event::$rules);
    
        $event = Event::find($id);

        $event->update($request->all());
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $evento = Event::find($id)->delete();
        
        return response()->json($evento);
    }
}
