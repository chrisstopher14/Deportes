@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/evento') }}" method="POST">
        @csrf
        @include('eventos.formEvento',['accion'=>'Registrar']);

        </form>
    </div>
@endsection
