<div class="table-responsive">
    <table class="table" id="agendamentos-table">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Datahoraagenda</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($agendamentos as $agendamento)
            <tr>
                <td>{{ $agendamento->medico_id }}</td>
            <td>{{ $agendamento->paciente_id }}</td>
            <td>{{ $agendamento->datahoraagenda }}</td>
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
