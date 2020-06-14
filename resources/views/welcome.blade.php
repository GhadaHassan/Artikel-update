@extends('layouts.app')

@section('title','Home')



@section('content')

    @auth
    <br><br>
      <div class="container">

        <div class="row">
          <h3>Bitte geben Sie ein Wort ein, um zu suchen</h3>
        </div>
        
        <div class="row">
          <form class="form-inline my-2 my-lg-5" action="{{ url('/search') }}">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Suchen" aria-label="Search" style="width:900px">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Suchen</button>
          </form>
        </div>
            
      </div>

    @else 
      @include('auth.login') 
      
    @endauth


     

 
@endsection