@extends('dashboard.layout.app')

@php
   $pageTitle = 'ARTIKEL VERWALLEN';   
@endphp

@section('content')

@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent

<div class="content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="card-title ">{{$pageTitle}}</h4>
                            {{-- <p class="card-category">{{$pageDes}}</p> --}}
                        </div>
                   
                    </div>
                  
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
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
                          @foreach ($artikels as $artikel)
                          <tr>
                              <td>{{$artikel->modul->name}}</td>
                              <td>{{$artikel->name}}</td>
                              <td>{{$artikel->username}}</td>
                              <td>{{$artikel->password}}</td>
                              <td><a href="{{$artikel->link}}" target="_blank">{{$artikel->link}}</a></td>
                              <td>{{$artikel->note}}</td>
                              
                              <td class="text-primary" class="td-actions">
            
                                <!-- To make edit and delete buttoms is shared-->
                                <a href="{{'/dashboard/artikels/'.$artikel->id.'/edit'}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Bearbeiten">
                                    <i class="material-icons">edit</i>
                                </a>
            
                                <form action="{{route('dashboard/artikels.delete',['id' => $artikel->id])}}" method="POST">
                                    @csrf
                                    {{ method_field('delete')}}
                                    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Löschen">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>
                                                   
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>   
    
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>

    
    </div>
</div>
    
@endsection