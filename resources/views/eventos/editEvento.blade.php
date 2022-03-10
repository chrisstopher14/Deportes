@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/evento/'.$evento->id) }}" method="post">
        @csrf
        @method('PATCH')
        @include('eventos.formEvento',['accion'=>'Editar'])
        </form>
    </div>
@endsection
