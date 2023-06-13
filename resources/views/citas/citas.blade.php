@extends('plantillaCitas')
@section('contenido')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Detalles de la Cita</h2>
        </div>
        <div class="card-body">
            <p class="card-text-label">Fecha:</p>
            <p class="card-text-value">{{ $fecha }}</p>
            <p class="card-text-label">Hora:</p>
            <p class="card-text-value">{{ $hora }}</p>
            <p class="card-text-label">Lugar:</p>
            <p class="card-text-value"><a
                    href="https://www.google.es/maps/place/Visualseyra/@41.58422,1.6043329,18z/data=!3m1!4b1!4m6!3m5!1s0x12a469fb9a7b2489:0x12b6233be1e36f61!8m2!3d41.58422!4d1.6051!16s%2Fg%2F11c30w1g6f?hl=es&entry=ttu">Oficinas
                    de VisualSeyra</a></p>
            <p class="card-text-label">Motivo:</p>
            <p class="card-text-value">Cita con el equipo de VisualSeyra para el tratamiento del servicio seleccionado.</p>
            <a href="{{ route('inicio.index') }}" class="btn btn-secondary">Volver</a>
            <button class="btn btn-danger delete-cita" data-cita-id="{{ $cita->id }}">Cancelar Cita</button>
        </div>
    </div>

    <!-- MODAL BORRADO -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Cancelar Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  ¿Estas seguro de que quieres cancelar tu cita?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="delete-cita-button">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.delete-cita').click(function() {
                var citaId = $(this).data('cita-id');
                $('#deleteModal').modal('show');
                $('#delete-cita-button').click(function() {
                    $.ajax({
                        url: '/citas/cancelar/' + citaId,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            window.location.href = '{{ route('inicio.index') }}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
