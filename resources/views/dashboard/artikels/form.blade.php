@csrf

    <div class="row">
        @php $input = 'name'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel Name</label>
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
        @php $input = 'username'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel Benutzername </label>
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
        @php $input = 'password'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel Kennwort </label>
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
        @php $input = 'old_password'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">altes password</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
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
        @php $input = 'link'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel Link</label>
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
        @php $input = 'note'; @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Artikel Bemerkungen </label>
            <textarea name="{{$input}}" id="" cols="30" rows="2" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}">{{isset($row) ? $row->{$input} : ''}}</textarea>

           
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
   