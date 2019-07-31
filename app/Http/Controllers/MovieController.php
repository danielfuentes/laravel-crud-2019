<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Amigas y amigos, aquí les muestro como yo programo labusqueda de la información en el modelo y como le paso los datos  a la vista
//Aquí incorporo mi modelo Movie
use App\Movie;

class MovieController extends Controller
{
    // Aquí creo mi función que se encargará de buscar los datos en la tabla, valiendome de algo que me ofrece Laravel, llamado Eloquent
    //procedo a crear la función index
    public function index(){
        //De esta forma estoy llamando a mi modelo y ademas el método all(), me trae todos los datos de esa tabla
        $peliculas = Movie::all();
        //Ahora que tengo esos datos, se los paso a la vista proximosEstrenos que debo crear y con el llamdo al método with que me ofrece laravel dispongo como parámetros la variable que contendra los datos que va a la vista 'peliculas' y la variable que posee almacenado los datos $peliculas, ojo: esto remplaza a la forma como lo ejecuta Daro en los videos haciendo uso del "concact".
        return view('movies.proximosEstrenos')->with('peliculas',$peliculas);
    }
    //Procedo a crear el otro método, pero ahora para mostrar el detalle de la película
    public function show($id){
        //Aquí almaceno en una variable el detalle, sólo del registro seleccionado
        $detalle = Movie::find($id);
        //Aquí retorno a la vista el detalle de la película seleccionada
        return view('movies.detallePelicula')->with('detalle',$detalle);
        
    }
}
