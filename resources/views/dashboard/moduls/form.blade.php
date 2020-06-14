@csrf

<div class="row">
    @php $input = 'name'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Modul Name</label>
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
