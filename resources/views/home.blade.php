@extends('layouts.master')
@section('contenido')
<main>
    <h2 class="__peliculasdeldia">Películas en estreno</h2>

    <div class="__peliculas row">
      <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">

        <img src="img/pelicula1.jpg" class="card-img-top __imgpelicula" alt="...">
        <div class="card-body">
          <p class="card-text __textopelicula">Hombres de negro</p>
          <a href="#" class="d-flex btn btn-primary __comprar">Ver detalle</a>
        </div>
      </div>
        <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
          <img src="img/pelicula10.jpg" class="card-img-top __imgpelicula" alt="...">
          <div class="card-body">
            <p class="card-text __textopelicula">El rey león</p>
            <a href="#" class="d-flex btn btn-primary __comprar">Ver detalle</a>
          </div>
        </div>
        <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
          <img src="img/pelicula3.jpg" class="card-img-top __imgpelicula" alt="...">
          <div class="card-body">
            <p class="card-text __textopelicula">Toy story 4</p>
            <a href="#" class="d-flex btn btn-primary __comprar" >Ver detalle</a>
          </div>
        </div>
        <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
          <img src="img/pelicula4.jpg" class="card-img-top __imgpelicula" alt="...">
          <div class="card-body">
            <p class="card-text __textopelicula">Mia y el león blanco</p>
            <a href="#" class="d-flex btn btn-primary __comprar">Ver detalle</a>
          </div>
        </div>
          <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
            <img src="img/pelicula8.jpg" class="card-img-top __imgpelicula" alt="...">
            <div class="card-body">
              <p class="card-text __textopelicula">Mascotas 2</p>
              <a href="#" class="d-flex btn btn-primary __comprar">Ver detalle</a>
            </div>
          </div>
          <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
            <img src="img/pelicula7.jpg" class="card-img-top __imgpelicula" alt="...">
            <div class="card-body">
              <p class="card-text __textopelicula">Spider-Man</p>
              <a href="#" class="d-flex btn btn-primary __comprar" >Ver detalle</a>
            </div>
          </div>
    </div>
  </main>

@endsection


