@extends('layouts.app')

@section('page-title','Lista dei Comics')

@section('content')

<div class="container py-5 text-center">
  <a href="{{route('comics.create')}}" class="btn btn-primary">Crea una nuova card</a>
</div>

<div class="container d-flex flex-wrap justify-content-between">

  @foreach ($comics as $comic)
    <div class="card mb-5 text-center" style="width: 18rem;">
        <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$comic->title}}</h5>
          <div class="d-flex">
            <div>
              <a href="{{route('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary">Vedi</a>
            </div>
            <div>
              <a href="{{route('comics.edit', ['comic' => $comic->id])}}" class="btn btn-info text-white">Modifica</a>
            </div>
            <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST" onsubmit="return confirm('Vuoi Eliminare?');">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Elimina</button>
            </form>

          </div>
        </div>
    </div>
  @endforeach
</div>
@endsection