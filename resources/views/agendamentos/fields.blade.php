<!-- Medico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medico_id', 'Médico:') !!}
    {!! Form::select('medico_id', $medicosArray, null, ['class' => 'js-example-basic-single form-control']) !!}
</div>

<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente:') !!}
    {!! Form::select('paciente_id', $pacientesArray, null, ['class' => 'js-example-basic-single form-control']) !!}
</div>

<!-- Dataagenda Field -->
<div class="form-group col-sm-3">
    {!! Form::label('dataagenda', 'Data Agenda:') !!}
    {!! Form::date('dataagenda', null, ['class' => 'form-control','id'=>'dataagenda']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#dataagenda').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Horaagenda Field -->
<div class="form-group col-sm-3">
    {!! Form::label('horaagenda', 'Hora Agenda:') !!}
    {!! Form::text('horaagenda', null, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5, 'id'=>'horaagenda', 'placeholder'=>'hh:mm']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('agendamentos.index') }}" class="btn btn-default">Cancelar</a>
</div>

@section('javascript')
    <script type="text/javascript">
        $('#horaagenda').mask('##:##');

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection