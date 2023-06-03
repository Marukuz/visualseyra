<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitasUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $dia;
    public $mes;
    public $hora;
    public $minutos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dia,$mes,$hora,$minutos)
    {
        //
        $this->dia = $dia;
        $this->mes = $mes;
        $this->hora = $hora;
        $this->minutos = $minutos;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail/citasUsuarios')
        ->subject('Tu Cita | VisualSeyra');
    }
}
