@extends('movies.layouts.app')

@section('title')
  Modifica Film {{ $movie->titolo }}
@endsection

@section('titolo')
  Modifica Film {{ $movie->titolo }}
@endsection

@section('section')
	<div class="film">

    @if ($errors->any())
     <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
     </ul>
     </div>
    @endif

    <form action="{{route('movies.update', $movie->id)}}" method="post">
    @csrf
    @method('PUT')
     <label for="titolo">Titolo</label>
     <input type="text" name="titolo" value="{{ $movie->titolo }}" placeholder="Titolo"> <br>
     <label for="year">Anno</label>
     <input type="text" name="year" value="{{ $movie->year }}" placeholder="Anno"> <br>
     <label for="description">Descrizione</label> <br>
     <textarea name="description" rows="4" cols="50">{{ $movie->description }}</textarea> <br>
     <label for="content">Rating</label>
     <input type="text" name="rating" placeholder="Rating" value="{{ $movie->rating }}"> <br>
     <br>
     <input class="submit" type="submit" value="Invia">
    </form>

	</div>
@endsection
