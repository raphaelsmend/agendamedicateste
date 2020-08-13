<div class="form-group col-sm-12">
    <h4 class="titulo"><i class="fa fa-fw fa-file-o" aria-hidden="true"></i>Dados do Paciente</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group col-sm-12">
                <table>
                    <tr>
                        <td style="padding-right: 10px"><strong>Nome Completo</strong></td>
                        <td style="padding-right: 10px"><strong>Data Nascimento</strong></td>
                        <td style="padding-right: 10px"><strong>Genero</strong></td>
                        <td style="padding-right: 10px"><strong>Telefone1</strong></td>
                        <td style="padding-right: 10px"><strong>Telefone2</strong></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px">{{ $paciente->nome }}</td>
                        <td style="padding-right: 10px">{{date('d/m/Y',strtotime($paciente->datanascimento))}}</td>
                        <td style="padding-right: 10px">
                                @switch($paciente->genero)
                                    @case('M')
                                        MASCULINO
                                        @break
                                    @case('F')
                                        FEMININO
                                        @break
                                    @default
                                        
                                @endswitch    
                            
                        </td>
                        <td style="padding-right: 10px">{{ $paciente->telefone1 }}</td>
                        <td style="padding-right: 10px">{{ $paciente->telefone2 }}</td>
                    </tr>
                </table>
            </div>    
        </div>    
    </div>    
</div>    

<div class="form-group col-sm-12">
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
                        <td style="padding-right: 10px">{{ $paciente->cep }}</td>
                        <td style="padding-right: 10px">{{ $paciente->endereco }}</td>
                        <td style="padding-right: 10px">{{ $paciente->numero }}</td>
                        <td style="padding-right: 10px">{{ $paciente->complemento }}</td>
                        <td style="padding-right: 10px">{{ $paciente->bairro }}</td>
                        <td style="padding-right: 10px">{{ $paciente->cidade }}</td>
                        <td style="padding-right: 10px">
                            {{ $paciente->uf }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
