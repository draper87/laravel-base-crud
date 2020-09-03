<div>
	<h1>Elenco Film</h1>

	<ul>
		@foreach ($movies as $movie)
			<li>{{ $movie->titolo }} <a href="{{ route('movies.show', $movie->id) }}">Dettagli</a></li>
		@endforeach
	</ul>

  <a href="{{ route('movies.create') }}">Crea nuovo film</a>

</div>
