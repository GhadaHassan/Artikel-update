@extends('dashboard.layout.app')

@section('title')
  {{$pageTitle = 'NUTZER BEARBEITEN'}}
@endsection
@section('content')
@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent
<div class="content">
    <div class="container-fluid">      
      @component('dashboard.shared.edit',['pageTitle' => $pageTitle, 'pageDes' => $pageDes])
        @slot('slot')
        <div class="card-body">
        <form action="{{route('users.update',$row->id)}}" method="POST">
            {{ method_field('put')}}
            @csrf
        <div class="row">
            @php $input = 'name'; @endphp
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Nutzer</label>
                <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required autofocus>
                @if ($errors->has($input))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($input) }}</strong>
                    </span>
                @endif
            </div>
            </div>              
        </div>
        <hr>
<div class="row">
    @php $input = 'email'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <div><label class="bmd-label-floating">E-Mail Adresse</label></div>
        <div><input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required></div>
        @if ($errors->has($input))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($input) }}</strong>
            </span>
        @endif
    </div>
    </div>                                
</div>

<div class="row">
    @php $input = 'password'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <div><label class="bmd-label-floating">Kennwort</label></div>
        <div><input type="password" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"></div>
        @if ($errors->has($input))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($input) }}</strong>
        </span>
    @endif
    </div>
    </div>
</div>

<div class="row">
    @php $input = 'group'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Gruppe</label>
        <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" >
            <option class="dropdown-menu dropdown-menu-right show" value="admin" {{ isset($row) && $row[$input] == 'admin' ? 'selected' : ''}}>Admin</option>
            <option class="dropdown-menu dropdown-menu-right show" value="user" {{ isset($row) && $row[$input] == 'user' ? 'selected' : ''}}>User</option>
        </select>
        @if ($errors->has($input))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($input) }}</strong>
            </span>
        @endif
    </div>
    </div>                                
</div>

<div class="row">        
    <div class="col-md-6">
        @php $input = 'moduls[]'; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Module</label>
            <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" multiple style="height: 100px">
                @foreach ($moduls as $modul)
                <option value="{{ $modul->id }}"{{ in_array($modul->id ,$selectedModuls) ? 'selected' : ''}}>{{$modul->name}}</option>
                    
                @endforeach
            </select>
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div> 
    
    <div class="col-md-6">
    <table class="table">
        <thead class=" text-primary">
        <th class="text-primary">
            Ausgewählte Module
        </th>
        </thead>
        <tbody>
        @foreach ($rows_modul as $item)
        <tr>
        <td>{{$item->name}}</td>
    </tr> 
        @endforeach
        
    
        </tbody>
    </table> 
    </div>
    
</div>
<hr>
<div class="row">        
    <div class="col-md-6">
        @php $input = 'artikels[]'; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel</label>
            <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" multiple style="height: 100px">
                @foreach ($artikels as $artikel)
                <option value="{{ $artikel->id }}"{{ in_array($artikel->id ,$selectedArtikels) ? 'selected' : ''}}>{{$artikel->name}}</option>
                    
                @endforeach
            </select>
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div> 

    <div class="col-md-6">
    <table class="table">
        <thead class=" text-primary">
        <th class="text-primary">
            Ausgewählte Artikel
        </th>
        </thead>
        <tbody>
        @foreach ($rows_artikel as $item)
        <tr>
        <td>{{$item->name}}</td>
    </tr> 
        @endforeach
        
    
        </tbody>
    </table> 
    </div>
    
    
</div>
<button type="submit" class="btn btn-primary pull-right">Nutzer bearbeiten</button>
            <div class="clearfix"></div>
          </form>
        </div>
        @endslot
      @endcomponent
    </div>
</div>
@endsection