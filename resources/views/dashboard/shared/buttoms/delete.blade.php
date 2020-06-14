<form action="{{route('dashboard/'.$routename.'.delete',['id' => $row->id])}}" method="POST">
    @csrf
    {{ method_field('delete')}}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Löschen">
        <i class="material-icons">close</i>
    </button>
</form>