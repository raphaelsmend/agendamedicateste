<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $medicos->nome }}</p>
</div>

<!-- Crm Field -->
<div class="form-group">
    {!! Form::label('crm', 'Crm:') !!}
    <p>{{ $medicos->crm }}</p>
</div>

<!-- Especialidade Id Field -->
<div class="form-group">
    {!! Form::label('especialidade_id', 'Especialidade:') !!}
    <p>{{ $medicos->especialidade_id }}</p>
</div>

