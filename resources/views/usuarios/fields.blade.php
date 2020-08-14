<div class="form-group col-sm-3">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>
<!-- Nome Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<div class="form-group col-sm-12">
</div>    

<div class="form-group col-sm-12">
    <h4 class="titulo"><i class="fa fa-lock" aria-hidden="true"></i> Acesso</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <!-- Senha Field -->
                @if ($trnMode == 'create')
                    <div class="form-group col-sm-3">
                        {!! Form::label('senha', 'Senha:') !!}
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha Atual">
                </div>
                @else
                    <div class="form-group col-sm-3">
                        {!! Form::label('senha', 'Senha Atual:') !!}
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha Atual">
                    </div>
                    <div class="form-group col-sm-12">
                    </div> 
                    <div class="form-group col-sm-3">
                        {!! Form::label('senha', 'Nova Senha:') !!}
                        <input type="password" name="senhanova" id="senhanova" class="form-control" placeholder="Nova Senha">
                    </div>
                @endif
                
                <div class="form-group col-sm-3">
                    {!! Form::label('senha', 'Confirmar Senha:') !!}
                    <input type="password" name="senhanovaconfirma" id="senhanovaconfirma" class="form-control" placeholder="Confirmar Nova Senha">
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
