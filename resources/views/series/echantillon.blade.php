@extends('layouts.app')

@section('content')
<section class="accueil">
        <div class="haut-de-page">
                
                <!-- <div class="logo-acceuil">
                    <img src="../connexion/img/logo.png">
                </div> -->
                    <div class="titles-acc">
                        <h1>Fox Play</h1>
                        <p>
                            Laissez <span>Fox Play</span> vous guider. </br> 
                         Rejoignez la<span>communauté</span> et: suivez l'actualité de vos séries préférées.
                         <i class='bx bxs-heart'></i>
                        </p>
                    
                        <div class="btn-acc">
                            <a href="#">Voir plus </a>
                        </div>
                        
                    </div>
            </div>                
</section>

<section class="series">
@if (!empty($serie))

    <div class="titles-ct">
            <h1 >Les séries les mieux notées</h1>
    </div>
    

        <ul>
            @foreach($serie as $s)
                <li>
                    <img src="{{asset($s->urlImage)}}">
                </li>
            @endforeach
        </ul>
    @else
        <p> Rien a afficher </p>
    @endif

    <div class="titles-ct">
            <h1> Les tendances du moment</h1>
    </div>

    
    

    @if (!empty($autreSerie))
        <ul>
            @foreach($autreSerie as $s)
                <li>
                    <img src="{{asset($s->urlImage)}}">
                </li>
            @endforeach
        </ul>
    @else
        <p> Rien a afficher </p>
    @endif
</section>
    
@endsection

   
