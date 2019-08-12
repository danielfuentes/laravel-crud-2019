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
    public function show($id)
    {
        $detalle = Movie::find($id);

        //Aquí almaceno en una variable el detalle, sólo del registro seleccionado
        //Aquí retorno a la vista el detalle de la película seleccionada
        return view('movies.detallePelicula')->with('detalle',$detalle);        
    }

    public function create()
    {
        $this->authorize('create', Movie::class);

        $generos = Genre::all();

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

    //Amigas y amigos. Aquí desarrolle el método para hacer la busqueda de la película, para ustedes puede resultar muy útil para que ejecuten busquedas de productos, de posteos, de preguntas, de lo que deseen que el usuario pueda buscar en su propuesta.
    public function search(Request $request)
    {
            
        $input = $request->input('busqueda');
        
        $peliculas = Movie::where('title','LIKE','%'.$input.'%')->paginate(20);
        return view('movies.proximosEstrenos')->with('peliculas',$peliculas);
        
    }


    //Amigas y amigos. Aquí les cree el método de Editar, este sólo muestra los datos de la película
    public function edit($id)
    {
        
        // Para cargar la vista de edición, en este caso tengo que mandarla con la pelicula (con su ID) y ademas su genero actual buscandolo individualmente ($genero), Mas los posibles generos que puedan llegar a tomar su lugar ($generos)


        $generos = Genre::all();

        $pelicula = Movie::find($id);

        //Esto lo hago para lograr atrapar el genero que esta guardado en la base de datos, la idea luego es poder enviarlo a la vista
        $idGenero = $pelicula->genre_id;
        $nombreGenero = Genre::find($idGenero);
        //dd($idGenero);
        //dd($nombreGenero);
        //Esto lo hago para chequear los datos que vienen de la base de datos
        // dd($pelicula->genres);

        // si el encadenamiento de metodos se extiende mucho...
        // return view('movies.editarPelicula')->with('pelicula', $pelicula)->with('genero', $genero)->with('generos', $generos);
        // lo podemos enviar de la siguiente forma:
        return view('movies.editarPelicula')
            ->with('pelicula', $pelicula)
            // ->with('idGenero', $idGenero)
            // ->with('nombreGenero',$nombreGenero)
            ->with('generos', $generos);

    }

    public function update(Request $request, $id)
    {
        // Aquí les dejo este dd comentado para que siempre tengan pendiente de ir viendo los cambios!
        //dd($request->all());
        // Aquí dispongo las mismas validaciones que creamos en el método de incluir película        
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

        // $this->validate($request,$reglas,$mensajes);
        
        //Aquí me sercioro que en realidad busque la película editada
        $pelicula = Movie::find($id);
        //Amigas y amigos. Para no usar lo que abajo está en comentarios y efectuarlo de una manera mas rápida podemos valernos de una función de PHP llamada array_dif: La cual Calcula y determina la diferencia entre arrays.
        //El llamado al método ->toArray(), lo que hace es convertir la colección en un array PHP plano. Si los elementos de la colección //son modelos Eloquent, los modelos también se convertirán a arrays, ampliar la información en: https://docs.laraveles.com/docs/5.5/collections#method-toarray
        $changes = array_diff($request->all(), $pelicula->toArray());

        $pelicula->update($changes);
        
        //Colocando las dos líneas anteriores, nos ahorramos todo lo que programamos abajo, para guardar los cambios de los campos por parte del usuario.    

        // Para reemplazar el dato que viene y así cambiarlo por el que el usuario dispone nuevo, lo ejecuto por medio de un if ternario
        //  $pelicula->title = $request->input('title') !== $pelicula->title ? $request->input('title') : $pelicula->title;
         // El titulo va a ser igual a lo que salga de este if ternario.
        //  $pelicula->rating = $request->input('rating') !== $pelicula->rating ? $request->input('rating') : $pelicula->rating;
        //  $pelicula->awards = $request->input('awards') !== $pelicula->awards ? $request->input('awards') : $pelicula->awards;
        //  $pelicula->length = $request->input('length') !== $pelicula->length ? $request->input('length') : $pelicula->length;
        //  $pelicula->release_date = $request->input('release_date') !== $pelicula->release_date ? $request->input('release_date') : $pelicula->release_date;
        //  $pelicula->genre_id = $request->input('genre_id') !== $pelicula->genre_id ? $request->input('genre_id') : $pelicula->genre_id;
         //Luego de hacer esta comparación entre lo que viene de la base de datos y lo que el usuario coloca o modifica, ,lo que hacemos es guardar los datos.
        //  $pelicula->save();

         // y vamos a ver los cambios:
         return redirect('proximosEstrenos');
    }

        //Aquí les creo el método para eliminar (destroy)
        public function destroy($id){
            $peliculaBorrar = Movie::find($id);
            //dd($peliculaBorrar);
            $peliculaBorrar->delete();
            return redirect('proximosEstrenos');
        }
}
