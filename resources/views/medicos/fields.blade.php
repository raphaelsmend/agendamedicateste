<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Crm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('crm', 'CRM:') !!}
    {!! Form::number('crm', null, ['class' => 'form-control']) !!}
</div>

<!-- Especialidade Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('especialidade_id', 'Especialidade:') !!}
    {!! Form::select('especialidade_id',$especialidadeArray, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('medicos.index') }}" class="btn btn-default">Cancelar</a>
</div>
