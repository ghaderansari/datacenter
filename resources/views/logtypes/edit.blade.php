@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('Logtype')}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logtype, ['route' => ['logtypes.update', $logtype->id], 'method' => 'patch']) !!}

                        @include('logtypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection