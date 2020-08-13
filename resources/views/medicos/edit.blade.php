@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Médico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicos, ['route' => ['medicos.update', $medicos->id], 'method' => 'patch']) !!}

                        @include('medicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection