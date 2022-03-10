<form action="{{ url('/evento') }}" method="POST">
    @csrf
    @include('eventos.formEvento',['accion'=>'Registrar']);

</form>
