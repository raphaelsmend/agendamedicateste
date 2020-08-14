<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%" id="usuarios-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuarios)
            <tr>
                <td>{{ $usuarios->nome }}</td>
                <td>{{ $usuarios->email }}</td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', $usuarios->email], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usuarios.show', [$usuarios->email]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('usuarios.edit', [$usuarios->email]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            
            formatarTabela('usuarios-table');
    
 });
    </script>
@endsection