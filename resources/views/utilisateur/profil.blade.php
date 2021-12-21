@extends('layouts.app')

@section('content')
    @if (Auth::user()->administrateur != 0)
    <section class="profil">
        <div class="conatainer">

            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->email}}</p>
            <p>Vous êtes administrateur !</p>

    <div class="infos">

        <p>{{Auth::user()->name}}</p>
        <p>{{Auth::user()->email}}</p>
        <p>{{Auth::user()->administrateur}}</p>

<!--<img src="{{asset('icon/woah-nice-cock.jpg')}}">-->


    <img src="{{asset(Auth::user()->avatar)}}">

    </div>

    @else
        <p>{{Auth::user()->name}}</p>
        <p>{{Auth::user()->email}}</p>
        <p>Vous n'êtes pas administrateur</p>

        
     </div>
    @endif
    </section>
@endsection