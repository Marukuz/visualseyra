@extends('plantilla')
@section('contenido')
    <div class="container">
        <div class="container">
            @foreach ($packs as $pack)
                <div class="col-md-12 mb-12">
                    <div class="card mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('img/' . $pack->image) }}" class="card-img custom-img" />
                            </div>
                            <div class="col-md-7">
                                <div class="card-body"
                                    style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                    <div style="flex-grow: 1;">
                                        <h5 class="card-title mt-2">{{ $pack->nombre }}</h5>
                                        @php
                                            $contenido = trim($pack->contenido);
                                            $elementos = explode('-', $contenido);
                                            array_shift($elementos);
                                        @endphp
                                        <ul class="mt-4">
                                            @foreach ($elementos as $elemento)
                                                <li>{{ $elemento }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div>
                                        <p>¿Quieres más información? Siempre puedes concretar una cita en nuestras <a href="https://www.google.es/maps/place/Visualseyra/@41.58422,1.6025197,17z/data=!4m6!3m5!1s0x12a469fb9a7b2489:0x12b6233be1e36f61!8m2!3d41.58422!4d1.6051!16s%2Fg%2F11c30w1g6f?hl=es&entry=ttu">oficinas.</a></p>
                                        @if (!Auth::user())
                                            <a href="{{ route('login') }}" class="btn btn-secondary buy-button">Pedir
                                                Cita</a>
                                            <a href="{{ route('login') }}" class="btn btn-success buy-button">Comprar</a>
                                        @else
                                            <a href="#" class="btn btn-primary buy-button" data-toggle="modal"
                                                data-target="#exampleModal{{ $pack->id }}">Pedir Cita</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal{{ $pack->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Pedir Cita</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('cita.create', $pack->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <h3>{{ $pack->nombre . ' - ' . $pack->servicio->nombre }}</h3>
                                    <img src="{{ asset('img/' . $pack->image) }}" class="custom-img" /><br><br><br>
                                    <label class="form-label">Elige una fecha:</label>
                                    <input type="datetime-local" id="fechaHora" class="form-control"
                                        placeholder="Elige una fecha para la cita" name="start">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Coger cita</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    </div>
    <script>
        const fechasBloqueadas = {!! $fechasBloqueadasFlatpickr !!};

        const datetimePicker = document.getElementById('fechaHora');

        flatpickr(datetimePicker, {
            enableTime: true, // Habilitar selección de tiempo
            dateFormat: "Y-m-d H:i", // Formato de fecha y hora
            time_24hr: true, // Formato de 24 horas
            // Configuración para bloquear horas
            disable: [
                // Bloquear fechas anteriores al día de hoy
                {
                    from: "1900-01-01",
                    to: new Date().setHours(0, 0, 0, 0) - 1,
                },
                // Bloquear fechas provenientes de la base de datos
                ...fechasBloqueadas.map((fecha) => ({
                    from: fecha.from,
                    to: fecha.to,
                })),
            ],
            onChange: function(selectedDates, dateStr, instance) {
                console.log("Fecha seleccionada:", dateStr);
            },
            locale: {
                weekdays: {
                    shorthand: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ]
                }
            }
        });
    </script>
@endsection
