

<a href="{{ url('/evento/') }}" class="btn btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
      </svg>   Volver
</a>
<h2>{{ $accion }} evento</h2>

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach ( $errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </div>


@endif

<div class="form-group">

    <label for="nombreEvento"> Nombre </label>
    <input type="text" class="form-control" name="nombreEvento"
    value="{{ isset($evento->nombreEvento)?$evento->nombreEvento:old('nombreEvento') }}" id="nombreEvento" >

    <label for="fechaEvento">Fecha</label>
    <input type="text" class="form-control" name="fechaEvento"
    value="{{ isset($evento->fechaEvento)?$evento->fechaEvento:old('fechaEvento') }}" id="fechaEvento" >

    <label for="ubicacionEvento">Ubicación</label>
    <input type="text" class="form-control" name="ubicacionEvento"
    value="{{ isset($evento->ubicacionEvento)?$evento->ubicacionEvento:old('fechaEvento') }}" id="ubicacionEvento" >

    <label for="participantesEvento">N° participantes</label>
    <input type="text" class="form-control" name="participantesEvento"
    value="{{ isset($evento->participantesEvento)?$evento->participantesEvento:old('participantesEvento') }}" id="participantesEvento" >


    <label for="deporte_id">Tipo de deporte</label>
    <select name="deporte_id" id="deporte_id" class="form-control"
    value="{{ isset($evento->deporte_id)?$evento->deporte_id:old('deporte_id') }}">

    <option value="0">Seleccionar...</option>
    @foreach ($deportes as $key => $value)

    <option value="{{ $key }}">{{$value }}</option>

    @endforeach


    </select>

<br><br>

    <a href=""  class="btn btn-success" >
    @if ($accion == 'Editar')
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
        </svg>

    @else
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
        </svg>
    @endif
    <input type="submit"  class="btn btn-success"  value=" {{ $accion }} datos">
    </a>

</div>
