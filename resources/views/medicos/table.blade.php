<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%" id="medicos-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicos as $medicos)
            <tr>
                <td>{{ $medicos->nome }}</td>
                <td>{{ $medicos->crm }}</td>
                
                @if (isset($medicos->Especialidade->nome))
                    <td>{{ $medicos->Especialidade->nome }}</td>    
                @else
                    <td></td>
                @endif
            
                <td>
                    {!! Form::open(['route' => ['medicos.destroy', $medicos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicos.show', [$medicos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('medicos.edit', [$medicos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            formatarTabela('medicos-table');
        } );
    </script>
@endsection