<!-- Medico Id Field -->
<div class="form-group">
    {!! Form::label('medico_id', 'Medico:') !!}
    @if (isset($agendamento->Medicos->nome))
        <p>{{$agendamento->Medicos->nome}}</p>
    @endif
</div>

<!-- Paciente Id Field -->
<div class="form-group">
    {!! Form::label('paciente_id', 'Paciente:') !!}
    @if (isset($agendamento->Paciente->nome))
    <p>{{$agendamento->Paciente->nome}}</p>
@endif
</div>
<!-- Dataagenda Field -->
<div class="form-group">
    {!! Form::label('dataagenda', 'Data Agenda:') !!}
    <p>{{ date('d/m/Y',strtotime($agendamento->dataagenda)) }}</p>
</div>

<!-- Horaagenda Field -->
<div class="form-group">
    {!! Form::label('horaagenda', 'Hora Agenda:') !!}
    <p>{{ $agendamento->horaagenda }}</p>
</div>

