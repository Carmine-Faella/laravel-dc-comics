@extends('layouts.app')

@section('page-title')
    Crea una nuova Card
@endsection

@section('content')

    <h1 class="text-white text-center pt-3">Crea una nuova Card</h1>

    <div class="py-5 text-center">
        <a href="{{route('comics.index')}}" class="btn btn-secondary">Torna alla lista</a>
    </div>

    <form method="POST" action="{{route('comics.update',['comic'=> $comic->id])}}" class="text-white">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description">{{ $comic->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Url dell'immagine:</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie Comics:</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di acquisto</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
        </div>
        <div class="py-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    </form>

@endsection