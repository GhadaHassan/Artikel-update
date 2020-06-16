@extends('dashboard.layout.app')

@php
   $pageTitle = 'MODULE VERWALTEN';   
@endphp

@section('title')
  {{$pageTitle}}
@endsection
@section('content')

@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent

<div class="content">
    <div class="container-fluid">
      
      @component('dashboard.shared.table',['pageTitle' => $pageTitle])

        @slot('addButton')
          <div class="col-md-3 text-center">
            <a href="/dashboard/{{$routename}}/create" class="btn btn-dark btn-round">Neues Modul</a>
          </div>
        @endslot 
        
        @slot('table')
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Modul
              </th>
              <th>
                Users
              </th>
              <th>Artikel</th>
              <th>
                Einstellungen
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
              <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td><br>
                    @foreach ($row->user as $item)
                    - {{ $item->name }}<br>
                    @endforeach
                    
                  </td>

                  <td><br>
                    @foreach ($row->artikel as $item)
                    - {{ $item->name }}<br>
                    @endforeach
                    
                  </td>
                  <td class="text-primary" class="td-actions">

                    <!-- To make edit and delete buttoms is shared-->
                      @include('dashboard.shared.buttoms.edit')

                      @include('dashboard.shared.buttoms.delete')
                                       
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>   
          {{ $rows->links() }} 
        @endslot
         
      @endcomponent
    </div>
</div>
    
@endsection