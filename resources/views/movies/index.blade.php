@extends('movies.layouts.app')

@section('title')
  Elenco Film
@endsection

@section('titolo')
  Elenco Film
@endsection

@section('section')
	<div class="film">

		<ul>
			@foreach ($movies as $movie)
				<li>{{ $movie->titolo }}
	        <a href="{{ route('movies.show', $movie->id) }}">Dettagli</a>
	        <a href="{{ route('movies.edit', $movie->id) }}">Modifica</a>

	        <form action="{{route('movies.destroy', $movie->id)}}" method="post">
	        @csrf
	        @method('DELETE')
	         <input class="submit" type="submit" value="Elimina">
	        </form>
	      </li>
			@endforeach
		</ul>

	  <a href="{{ route('movies.create') }}">Crea nuovo film</a>

	</div>
@endsection
