<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%" id="agendamentos-table">
        <thead>
            <tr>
                <th>Medico</th>       <!-- 1st column -->
                <th>Paciente</th>     <!-- 2nd column -->
                <th>Data Agenda</th>  <!-- 3rd column; th added here -->
                <th>Hora Agenda</th>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach($agendamentos as $agendamento)
            <tr>
                @if (isset($agendamento->Medicos->nome))
                    <td>{{$agendamento->Medicos->nome}}</td>
                @endif
                @if (isset($agendamento->Paciente->nome))
                    <td>{{$agendamento->Paciente->nome}}</td>
                @endif
                <td>{{ date('d/m/Y',strtotime($agendamento->dataagenda)) }}</td>
                <td>{{ $agendamento->horaagenda }}</td>
                <td>
                    {!! Form::open(['route' => ['agendamentos.destroy', $agendamento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agendamentos.show', [$agendamento->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('agendamentos.edit', [$agendamento->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir o registro?')"]) !!}
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
            formatarTabela('agendamentos-table');
        } );
    </script>
@endsection