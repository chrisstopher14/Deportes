
<h2>{{ $accion }} evento</h2>
<label for="nombreEvento"> Nombre </label>
<input type="text" name="nombreEvento"
value="{{ isset($evento->nombreEvento)?$evento->nombreEvento:old('nombreEvento') }}" id="nombreEvento" >
<br>
<label for="fechaEvento">Fecha</label>
<input type="text" name="fechaEvento"
value="{{ isset($evento->fechaEvento)?$evento->fechaEvento:old('fechaEvento') }}" id="fechaEvento" >
<br>
<label for="ubicacionEvento">Ubicación</label>
<input type="text" name="ubicacionEvento"
value="{{ isset($evento->ubicacionEvento)?$evento->ubicacionEvento:old('fechaEvento') }}" id="ubicacionEvento" >
<br>
<label for="participantesEvento">N° participantes</label>
<input type="text" name="participantesEvento"
value="{{ isset($evento->participantesEvento)?$evento->participantesEvento:old('participantesEvento') }}" id="participantesEvento" >
<br>
<label for="deporte_id">Tipo de deporte</label>
<input type="number" name="deporte_id"
value="{{ isset($evento->deporte_id)?$evento->deporte_id:old('deporte_id') }}" id="deporte_id" >
<br>
<input type="submit" value="{{ $accion }} datos">
<a href="{{ url('/evento/') }}">Regresar</a>
<br>
