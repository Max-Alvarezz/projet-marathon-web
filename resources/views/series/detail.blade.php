@extends('layouts.app')
@section('content')
    @php($season=null)

    <p  class="page-title">{{$serie -> nom}}</p>
    <div class="infos-serie">
    <div class="infos-stats">
    <img src="{{asset($serie->urlImage)}}">
    <p>Genre : {{$serie -> genre}} </p>
    <p>Langue : {{$serie -> langue}} </p>
    <p>Statue : {{$serie -> statut}} </p>
    <p>Date de sortie : {{$serie -> premiere}} </p>
    <p>Note : {{$serie -> note}} </p>
    </div>
    <div class="infos-resume">
    <p>Résumé : </p>{!!$serie->resume !!}
    @auth
        <form method="post" action="/series/{{$serie->id}}/vue">
            @csrf
            <div>
                <a href="submit">Vu</a>
            </div>
        </form>
    @endauth
    </div>
    </div>


    <head>
        <title>COMMENTAIRE :</title>
    </head>

    <body>
    <form class="avis-serie" action="{{route('commentaire.store',[$serie->id])}}" method="post">
        @csrf
        <ul>
          <li>

                <label for="user_message ">Commentaire :</label>
                <textarea id="user_message" name="content"></textarea>
            </li>
            <li>
                <label for="Note :">Note :</label>

                <select class="filter-method" id="dd" name="note">

                    <option value="0">0</option>

                    <option value="1">1</option>

                    <option value="2">2</option>

                    <option value="3">3</option>

                    <option value="4">4</option>

                    <option value="5">5</option>

                </select>

            </li>

            <li><button type="submit" name="Valider">Valider</button></li>

        </ul>

    </form>

    </body>
    <p>Saisons :</p>
    @if(!empty($e))
        <ul>
            @auth

            @endauth
            @foreach($e as $i)
                @if($season!=$i->saison)
                    @php($season= $i->saison)
                        <div>
                            <button type="submit">Saison vue!</button>
                        </div>
                    <h3>Saison {{$season}}</h3>
                @endif

                @auth
                    @if(\App\Http\Controllers\SerieController::unseen($i->id))
                    <div>
                        <a type="button" href="{{route('vueEpisode',[$i->id])}}">Episode vu!</a>
                    </div>
                        @else
                        <div>
                            épisode déja vu!
                        </div>
                    @endif
                @endauth
                <li><img src="{{asset($i->urlImage)}}"></li>
                <p>Saison {{$i -> saison}} épisode {{$i -> numero}} : {{$i -> nom}} </p>
            @endforeach
                @endif





    <h2>J'affiche commentaire</h2>

    @foreach($serie->comments as $comment)

        <p>Commentaire de l'utilisateur numéro : {{$comment->note}}</p>

        <p> {!! $comment->content !!} </p>

        <p>Note : {{$comment->note}} </p>

        <p>Validation : {{$comment->validated}}</p>

    @endforeach





    <p>Saisons :</p>


    <div class="dropdown">
      <button class="dropbtn">Saisons</button>
      <div class="dropdown-content">
        <a href="#">Saison</a>

      </div>
    </div>

    @if(!empty($serieTrie))


        <div  class="affichage-saison">
            @foreach($serieTrie as $num => $saison)
                <div class="saison">
                        <h3 id="saison-{{$num}}">Saison {{$num}}</h3>
                        @auth
                         <div>
                            <button class="btn-acc" type="submit">Saison vue!</button>
                        </div>
                    @endauth
                    <div class="episodes-list">
                        @foreach($saison as $e)
                            <div class="episode">
                            <img class="img-episodes" src="{{asset($e->urlImage)}}">
                            <p>Saison {{$e -> saison}} épisode {{$e -> numero}} : {{$e -> nom}} </p>
                            @auth
                                <div>
                                     <button class="btn-acc" type="submit">Episode vu!</button>
                                </div>
                            @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
         </div>


    @else

        <p>pas d'image</p>

    @endif

@endsection