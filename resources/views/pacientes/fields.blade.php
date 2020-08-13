@push('scripts')
    <script type="text/javascript">
        $('#datanascimento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<div class="form-group col-sm-12">
    <h4 class="titulo"><i class="fa fa-fw fa-file-o" aria-hidden="true"></i>Dados do Paciente</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group col-sm-12">
                <table>
                    <tr>
                        <td style="padding-right: 10px"><strong>Nome Completo:</strong></td>
                        <td style="padding-right: 10px"><strong>Data Nascimento:</strong></td>
                        <td style="padding-right: 10px"><strong>Genero:</strong></td>
                        <td style="padding-right: 10px"><strong>Telefone1:</strong></td>
                        <td style="padding-right: 10px"><strong>Telefone2:</strong></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px">{!! Form::text('nome', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'style' => 'width:350px']) !!}</td>
                        <td style="padding-right: 10px">{!! Form::date('datanascimento', null, ['class' => 'form-control','id'=>'datanascimento']) !!}</td>
                        <td style="padding-right: 10px">
                                {!! Form::select('genero', array(
                                '' => 'Selecione', 
                                'M' => 'Masculino', 
                                'F' => 'Feminino')
                                , isset($paciente) ? $paciente->genero : '', ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}    
                            
                        </td>
                        <td style="padding-right: 10px">{!! Form::text('telefone1', null, ['class' => 'form-control','maxlength' => 14,'maxlength' => 14, 'id' => 'tel1']) !!}</td>
                        <td style="padding-right: 10px">{!! Form::text('telefone2', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15, 'id' => 'tel2']) !!}</td>
                    </tr>
                </table>
            </div>    
        </div>    
    </div>    
</div>    

<h4 class="titulo"><i class="fa fa-fw fa-file-o" aria-hidden="true"></i>Endereço</h4>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            <table>
                <tr>
                    <td style="padding-right: 10px"><strong>Cep</strong></td>
                    <td style="padding-right: 10px"><strong>Endereco</strong></td>
                    <td style="padding-right: 10px"><strong>Número</strong></td>
                    <td style="padding-right: 10px"><strong>Complemento</strong></td>
                    <td style="padding-right: 10px"><strong>Bairro</strong></td>
                    <td style="padding-right: 10px"><strong>Cidade</strong></td>
                    <td style="padding-right: 10px"><strong>Uf</strong></td>
                </tr>
                <tr>
                    <td style="padding-right: 10px">{!! Form::text('cep', null, ['class' => 'form-control','maxlength' => 9,'maxlength' => 9, 'style' => 'width:100px', 'id' => 'cep']) !!}</td>
                    <td style="padding-right: 10px">{!! Form::text('endereco', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200, 'style' => 'width:300px', 'id' => 'endereco']) !!}</td>
                    <td style="padding-right: 10px">{!! Form::number('numero', null, ['class' => 'form-control', 'style' => 'width:90px', 'id' => 'numero']) !!}</td>
                    <td style="padding-right: 10px">{!! Form::text('complemento', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'style' => 'width:300px', 'id' => 'complemento']) !!}</td>
                    <td style="padding-right: 10px">{!! Form::text('bairro', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'id' => 'bairro']) !!}</td>
                    <td style="padding-right: 10px">{!! Form::text('cidade', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'style' => 'width:300px', 'id' => 'cidade']) !!}</td>
                    <td style="padding-right: 10px">
                        {!! Form::select('uf', array(
                            '' => 'Selecione', 
                            'AC' => 'AC',
                            'AL' => 'AL',
                            'AP' => 'AP',
                            'AM' => 'AM',
                            'BA' => 'BA',
                            'CE' => 'CE',
                            'DF' => 'DF',
                            'ES' => 'ES',
                            'GO' => 'GO',
                            'MA' => 'MA',
                            'MS' => 'MS',
                            'MT' => 'MT',
                            'MG' => 'MG',
                            'PA' => 'PA',
                            'PB' => 'PB',
                            'PR' => 'PR',
                            'PE' => 'PE',
                            'PI' => 'PI',
                            'RJ' => 'RJ',
                            'RN' => 'RN',
                            'RS' => 'RS',
                            'RO' => 'RO',
                            'RR' => 'RR',
                            'SC' => 'SC',
                            'SP' => 'SP',
                            'SE' => 'SE',
                            'TO' => 'TO',
                            )
                            , isset($paciente) ? $paciente->uf : '', ['class' => 'form-control','maxlength' => 2,'maxlength' => 2, 'style' => 'width:110px', 'id' => 'uf']) !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('pacientes.index') }}" class="btn btn-default">Cancelar</a>
</div>

@section('javascript')
    <script type="text/javascript">
        $('#cep').mask('#####-###');
        $('#tel1').mask('(##)####-####');
        $('#tel2').mask('(##)#####-####');

        function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#estado").val("");
                // $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {
                
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#endereco").val("...");
                    $("#cidade").val("...");
                    $("#estado").val("...");
                    $("#uf").val("...");
                    $("#bairro").val("...");
                    // $("#ibge").val("...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#endereco").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#estado").val(estado);
                            
                        } //end if.  
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    </script>
@endsection