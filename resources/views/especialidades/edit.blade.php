@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Especialidade Médica
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($especialidade, ['route' => ['especialidades.update', $especialidade->id], 'method' => 'patch']) !!}

                        @include('especialidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection