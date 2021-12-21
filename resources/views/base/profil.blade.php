@extends('layouts.app')


@section('content')
    @if (Auth::user())


    <div 
            <li> Pseudo : {{ Auth::user()->name }}</li>
            <li>{{ Auth::user()->email }}</li>
            <li>{{ Auth::user()->avatar }}</li>

            <img src="">
        </div>
    

  
        
    @endif
  
@endsection