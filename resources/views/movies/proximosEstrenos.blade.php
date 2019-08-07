@extends('layouts.main')
@section('contenido')
<main>
    <h2 class="__peliculasdeldia">Próximos Estrenos</h2>

    <div class="__peliculas_blade row">
      <div class="d-flex card col-12  __itempelicula" style="width: 18rem;">
        <a href="/incluirPelicula">Incluir película</a>
        <table class="table" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de la película</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($peliculas as $pelicula)
                    <tr>
                        <td>
                            {{$pelicula->id}}             
                        </td>    
                        <td>
                            {{$pelicula->title}}
                        </td>
                        <td>
                            <a href="/detallePelicula/{{$pelicula->id}}">Ver</a>
                        </td>
                        <td>
                            <a href="/pelicula/{{$pelicula->id}}/update">Editar</a>
                        </td>
                        <td>
                            <a href="/eliminarPelicula/{{$pelicula->id}}">Eliminar</a>
                        </td>
                        </tr>
                    @endforeach

                    
                
            </tbody>
        </table>
        <div>
            {{$peliculas->links()}}
        </div>
        
      </div>
        
    </div>
  </main>

@endsection


