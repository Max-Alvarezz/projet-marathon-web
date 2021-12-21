@extends('layouts.app')

@section('content')
    <div class="list-btn">
    <a class="btn-genre" href="{{route('tri','Fantasy')}}">Fantasy</a>
    <a class="btn-genre" href="{{route('tri','Comedy')}}">Comédie</a>
    <a class="btn-genre" href="{{route('tri','Crime')}}">Crime</a>
    <a class="btn-genre" href="{{route('tri','Thriller')}}">Thriller</a>
    <a class="btn-genre" href="{{route('tri','Science-Fiction')}}">Science-Fiction</a>
    <a class="btn-genre" href="{{route('tri','Romance')}}">Romance</a>
    <a class="btn-genre" href="{{route('tri','Legal')}}">Legal</a>
    <a class="btn-genre" href="{{route('tri','Western')}}">Western</a>
    <a class="btn-genre" href="{{route('tri','Horror')}}">Horreur</a>
    <a class="btn-genre" href="{{route('tri','History')}}">Historique</a>
    <a class="btn-genre" href="{{route('tri','Supernatural')}}">Supernatural</a>
    <a class="btn-genre" href="{{route('tri','Drama')}}">Dramatique</a>
    <a class="btn-genre" href="{{route('tri','Anime')}}">Anime</a>
    <a class="btn-genre" href="{{route('tri','Family')}}">Famille</a>
    </div>



<p class="page-title"> Liste des séries </p>
@if (!empty($serie))
    <ul>
    <li class="grid-series">
        @foreach($serie as $s)
                <div class="infos-series">
                <a href="{{route('serie.detail',$s->id)}}"><img class = "img-series" src="{{asset($s->urlImage)}}"></a>
                <p>Titre : {{$s -> nom}} </p>
                <p>Genre : {{$s -> genre}} </p>
                <p>Langue : {{$s -> langue}} </p>
                <p>Statut : {{$s -> statut}} </p>
                </div>
        @endforeach
        </li>
    </ul>
@else
    <p> Rien a afficher </p>
@endif



@endsection