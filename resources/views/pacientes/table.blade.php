<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%" id="pacientes-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Dta. Nascimento</th>
                <th>Genero</th>
                <th>Tel. Fixo</th>
                <th>Tel. Celular</th>
                {{-- <th>Cep</th>
                <th>Endereco</th>
                <th>Numero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Uf</th> --}}
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->nome }}</td>
                <td>{{ date('d/m/Y',strtotime($paciente->datanascimento)) }}</td>
                @switch($paciente->genero)
                    @case('M')
                        <td>MASCULINO</td>
                        @break
                    @case('F')
                        <td>FEMININO</td>
                        @break
                    @default
                        <td></td>
                @endswitch
                <td>{{ $paciente->telefone1 }}</td>
                <td>{{ $paciente->telefone2 }}</td>
                {{-- <td>{{ $paciente->cep }}</td>
                <td>{{ $paciente->endereco }}</td>
                <td>{{ $paciente->numero }}</td>
                <td>{{ $paciente->complemento }}</td>
                <td>{{ $paciente->bairro }}</td>
                <td>{{ $paciente->cidade }}</td>
                <td>{{ $paciente->uf }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['pacientes.destroy', $paciente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pacientes.show', [$paciente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pacientes.edit', [$paciente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja exlcuir o registro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            formatarTabela('pacientes-table');
        } );
    </script>
@endsection