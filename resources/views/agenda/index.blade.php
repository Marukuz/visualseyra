@extends('plantillaAdmin')
@section('contenido')
<br><br><br>
<div class="container">
    <div id="agenda">

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                
                <form action="" id="formularioEventos">
                    {!! csrf_field() !!}
                    <div class="form-group d-none">
                      <label for="id">ID:</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                    </div>

                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Introduce una descripcion"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="start">Fecha Inicio</label>
                      <input type="datetime-local" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="end">Fecha Fin</label>
                      <input type="datetime-local" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                <button type="button" class="btn btn-danger"  id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection