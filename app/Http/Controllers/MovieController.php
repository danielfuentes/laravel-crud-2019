<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Amigas y amigos, aquí les muestro como yo programo labusqueda de la información en el modelo y como le paso los datos  a la vista
//Aquí incorporo mi modelo Movie
use App\Movie;
use App\Genre;

class MovieController extends Controller
{
    // Aquí creo mi función que se encargará de buscar los datos en la tabla, valiendome de algo que me ofrece Laravel, llamado Eloquent
    //procedo a crear la función index
    public function index(){
        //De esta forma estoy llamando a mi modelo y ademas el método all(), me trae todos los datos de esa tabla
        $peliculas = Movie::paginate(6);
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

    public function create(){
        $generos = Genre::all();
        //dd($generos);
        return view('movies.incluirPelicula')->with('generos',$generos);
    }

    public function save(Request $request){
        $reglas =[
            'title' => 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'length' => 'required|numeric',
            'genre_id' => 'required',
            'release_date' => 'date'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio',
            //'unique' => 'El campo :attribute ya existe',
            'numeric' => 'El campo :attribute debe ser numérico',
            'date' => 'El campo :attribute debe ser una fecha válida'
        ];

        $this->validate($request,$reglas,$mensajes);

        $nuevaPelicula = new Movie($request->all());
        $nuevaPelicula->save();
        return redirect('proximosEstrenos');



    }

}
