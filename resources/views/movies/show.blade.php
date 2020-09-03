<h1>{{ $movie->titolo }}</h1>

<ul>
	<li>Anno: {{ $movie->year }}</li>
	<li>Descrizione: {{ $movie->description }}</li>
	<li>Rating: {{ $movie->rating }}</li>
</ul>

<a href="{{ route('movies.index') }}">Torna a index</a>
