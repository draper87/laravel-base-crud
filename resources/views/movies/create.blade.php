@extends('movies.layouts.app')

@section('title')
  Crea Film
@endsection

@section('titolo')
  Crea Film
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

    <form action="{{route('movies.store')}}" method="post">
    @csrf
    @method('POST')
     <label for="titolo">Titolo</label>
     <input type="text" name="titolo" value="{{ old('titolo') }}" placeholder="Titolo"> <br>
     <label for="year">Anno</label>
     <input type="text" name="year" value="{{ old('year') }}" placeholder="Anno"> <br>
     <label for="description">Descrizione</label> <br>
     <textarea name="description" rows="4" cols="50" value="{{ old('description') }}"></textarea> <br>
     <label for="content">Rating</label>
     <input type="text" name="rating" placeholder="Rating" value="{{ old('rating') }}"> <br>
     <br>
     <input class="submit" type="submit" value="Invia">
    </form>
  </div>


@endsection
