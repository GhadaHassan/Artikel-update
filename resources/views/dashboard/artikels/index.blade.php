@extends('dashboard.layout.app')

@php
   $pageTitle = 'ARTIKEL VERWALLEN';   
  //  $pageDes = "Here you can add / edit / delete Nutzer"; 
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
            <a href="/dashboard/{{$routename}}/create" class="btn btn-dark btn-round">Neues Artikel</a>
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
                Artikel
              </th>
              <th>
                Benutzername
              </th>
              <th>
                Kennwort
              </th>
              <th>
                Link
              </th>
              <th>
                Bemerkungen
              </th>   
              
              <th>
                Einstellungen
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
              <tr>
                  <td>{{$row->id}}</td>
                  <td class="text-primary"><br>
                    @foreach ($row->modul as $item)
                    - {{ $item->name }}<br>
                    @endforeach
                    
                  </td>
                  {{-- <td class="text-primary">{{$row->modul->name}}</td> --}}
                  <td>{{$row->name}}</td>
                  <td>{{$row->username}}</td>
                  <td>{{$row->password}}</td>
                  <td><a href="{{$row->link}}" target="_blank">{{$row->link}}</a></td>
                  <td>{{$row->note}}</td>
                  
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