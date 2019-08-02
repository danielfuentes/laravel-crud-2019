@extends('layouts.main')
@section('contenido')
<main>
    <h2 class="__peliculasdeldia">Detalle de la película</h2>

    <div class="__peliculas row">
        <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
            <div>
                titulo: {{$detalle->title}}
                <br>
                Rating: {{$detalle->rating}}
                <br>
                Premios: {{$detalle->awards}}
                <br>
                Fecha de creación: {{$detalle->release_date}}
                <br>
            </div>
            <br>
            <a href="/proximosEstrenos">Volver</a>             
           
         
        </div>
        
    </div>
  </main>

@endsection


