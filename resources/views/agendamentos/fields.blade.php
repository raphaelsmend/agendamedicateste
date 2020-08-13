<!-- Medico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medico_id', 'Médico:') !!}
    {!! Form::number('medico_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente:') !!}
    {!! Form::number('paciente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Datahoraagenda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datahoraagenda', 'Datahoraagenda:') !!}
    {!! Form::text('datahoraagenda', null, ['class' => 'form-control','id'=>'datahoraagenda']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#datahoraagenda').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('agendamentos.index') }}" class="btn btn-default">Cancelar</a>
</div>
