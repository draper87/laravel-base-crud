<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::all();

      return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validiamo i dati inseriti dall utente
        $request->validate($this->getValidationRules());

        // se i dati sono corretti li mettiamo dentro una variabile
        $dati = $request->all();

        // creiamo una nuova istanza della classe Movie
        $new_movie = new Movie();

        // posso usare questo metodo per passare i dati
        // $new_movie->titolo = $dati['titolo'];
        // $new_movie->year = $dati['year'];
        // $new_movie->description = $dati['description'];
        // $new_movie->rating = $dati['rating'];

        // oppure questo piu sintattico
        $new_movie->fill($dati);

        // poi procediamo con il salvataggio nel database
        $new_movie->save();

        // Se il salvataggio va a buon fine $new_movie restituira 'true', possiamo quindi utilizzare un condizionale per prelevare il record piu recente del database e utilizzarlo per fare un redirect alla sua pagina
        if ($new_movie) {
          $movie = Movie::orderBy('id', 'desc')->first();
          return redirect()->route('movies.show', $movie->id);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Movie $movie)
     {
         return view('movies.show', compact('movie'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        // validiamo i dati inseriti dall utente
        $request->validate($this->getValidationRules());

        // prelevo i dati ricevuti dal form e aggiorno il database
        $dati_update = $request->all();
        $movie->update($dati_update);

        // ritorno alla pagina principale se la modifica e avvenuta con successo
        if ($movie) {
          $movies = Movie::all();
          return view('movies.index', compact('movies'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        // elimino il record dal database
        $movie->delete();

        // ritorno alla pagina principale
        if ($movie) {
          $movies = Movie::all();
          return view('movies.index', compact('movies'));
        }
    }

    // creiamo una funzione che torna i parametri per la validazione
    public function getValidationRules() {
      return [
        'titolo' => 'required|max:255',
        'year' => 'required|integer|max:2020',
        'description' => 'required',
        'rating' => 'required|integer|min:0|max:10'
      ];
    }
}
