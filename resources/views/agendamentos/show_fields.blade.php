<!-- Medico Id Field -->
<div class="form-group">
    {!! Form::label('medico_id', 'Medico Id:') !!}
    <p>{{ $agendamento->medico_id }}</p>
</div>

<!-- Paciente Id Field -->
<div class="form-group">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    <p>{{ $agendamento->paciente_id }}</p>
</div>

<!-- Datahoraagenda Field -->
<div class="form-group">
    {!! Form::label('datahoraagenda', 'Datahoraagenda:') !!}
    <p>{{ $agendamento->datahoraagenda }}</p>
</div>

