@extends('dashboard.layout.app')

@php
   $pageTitle = 'Neuer Nutzer';   
@endphp

@section('title')
  {{$pageTitle}}
@endsection
@section('content')

@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent
<div class="content">
    <div class="container-fluid">
      @component('dashboard.shared.create',['pageTitle' => $pageTitle])

      @slot('slot')
        <div class="card-body">
          <form action="{{route('users.store')}}" method="POST">
            @include('dashboard.'.$routename.'.form')
            
            <button type="submit" class="btn btn-primary pull-right">Nutzer Aktivieren</button>
            <div class="clearfix"></div>
          </form>
        </div>
          
      @endslot
          
      @endcomponent
    </div>
</div>
    
@endsection