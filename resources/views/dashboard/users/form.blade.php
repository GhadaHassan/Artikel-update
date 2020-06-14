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
        <label class="bmd-label-floating">E-Mail Address</label>
        <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required>
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
    @php $input = 'password'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Kennwort</label>
        <input type="password" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}">
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
<hr>
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
      
     
</div>
<hr>

<div class="row">        
    <div class="col-md-6">
        @php $input = 'artikels[]'; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikels</label>
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
      
     
</div>
<hr>
