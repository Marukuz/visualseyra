@extends('plantilla')
@section('contenido')
<style>
    html, body {
        height: 100%;
    }
</style>

<div class="container" style="display: flex; align-items: center; justify-content: center; height: 100%;">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('../img/bodas.jpg') }}" class="card-img-top" alt="Servicio 1">
                <div class="card-body">
                    <h5 class="card-title">Bodas</h5>
                    <p class="card-text">Descripción del servicio 1.</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('../img/comuniones.jpg') }}" class="card-img-top" alt="Servicio 2">
                <div class="card-body">
                    <h5 class="card-title">Comuniones</h5>
                    <p class="card-text">Descripción del servicio 2.</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
