@extends('layouts.app')

@section('page-title')
    Pasta: {{$comic->title}}
@endsection

@section('content')

<h1 class="text-white">Dettagli</h1>

    <div class="card my-5">
        <div class="row g-0">
          <div class="col-3">
            <img src="{{$comic->thumb}}" class="img-fluid rounded-start" alt="{{$comic->title}}">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">{{$comic->title}}</h5>
              <p class="card-text">{{$comic->description}}</p>
              <p class="card-text"><small class="text-body-secondary">{{$comic->series}}</small></p>
              <p class="card-text"><small class="text-body-secondary"></small>{{$comic->price}}&euro;</p>
              <p class="card-text"><small class="text-body-secondary"></small>{{$comic->sale_date}}</p>
              <p class="card-text"><small class="text-body-secondary"></small>{{$comic->type}}</p>
              <a href="{{route('comics.index')}}" class="btn btn-secondary">Torna alla lista</a>
            </div>
          </div>
        </div>
      </div>

@endsection