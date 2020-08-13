@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar Médico
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'medicos.store']) !!}

                        @include('medicos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
