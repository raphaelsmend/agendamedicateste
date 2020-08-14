@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agendamento Médico
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('agendamentos.show_fields')
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
