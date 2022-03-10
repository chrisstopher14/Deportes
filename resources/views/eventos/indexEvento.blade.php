@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif

<a href="{{ url('/evento/create') }}">Create</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Deporte</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Ubicacion</th>
            <th>N° Participantes</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($eventos as $evento)
        <tr>
            <td>{{ $evento->id }}</td>
            <td>{{ $evento->deporte_id }}</td>
            <td>{{ $evento->nombreEvento }}</td>
            <td>{{ $evento->fechaEvento }}</td>
            <td>{{ $evento->ubicacionEvento }}</td>
            <td>{{ $evento->participantesEvento }}</td>
            <td>

                <a href="{{ url('/evento/'.$evento->id.'/edit') }}">
                    Editar
                </a>

                <form action="{{ url('/evento/'.$evento->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <input type="submit" onclick="return confirm('¿Deseas Borrar?')" value="Borrar">
                </form>

            </td>

        </tr>
        @endforeach

    </tbody>

</table>
</div>
@endsection
