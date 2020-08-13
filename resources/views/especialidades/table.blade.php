<div class="table-responsive">
    <table class="table" id="especialidades-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($especialidades as $especialidade)
            <tr>
                <td>{{ $especialidade->nome }}</td>
                <td>
                    {!! Form::open(['route' => ['especialidades.destroy', $especialidade->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('especialidades.show', [$especialidade->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('especialidades.edit', [$especialidade->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir o registro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
