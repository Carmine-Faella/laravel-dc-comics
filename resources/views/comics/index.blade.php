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
        <a href="{{route('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary">Vedi dettagli</a>
        </div>
    </div>
  @endforeach
</div>
@endsection