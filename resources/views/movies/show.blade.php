@extends('movies.layouts.app')

@section('title')
  Film {{ $movie->titolo }}
@endsection

@section('titolo')
  Film {{ $movie->titolo }}
@endsection

@section('section')
	<div class="film">

		<ul>
			<li>Anno: {{ $movie->year }}</li>
			<li>Descrizione: {{ $movie->description }}</li>
			<li>Rating: {{ $movie->rating }}</li>
		</ul>

		<a href="{{ route('movies.index') }}">Torna a index</a>

	</div>
@endsection
