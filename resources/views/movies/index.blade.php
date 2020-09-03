<div>
	<h1>Elenco Film</h1>

	<ul>
		@foreach ($movies as $movie)
			<li>{{ $movie->titolo }}</li>
		@endforeach
	</ul>



</div>
