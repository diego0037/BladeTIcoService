@extends('layouts.app')

@section('title', 'Actualizar Perfil')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')


<div class="container">
 
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- <div class="panel panel-default"> -->
                <!-- <div class="panel-heading">Registro de usuario</div> -->
                <div class="panel-body">
               {{ Form::open(array('url' => 'api/saveUpdate', 'method' => 'PATCH'), array('role' => 'form')) }}
<div class="row">
<div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
  {{ Form::label('name', 'Nombre', array('id' => 'CTlogRes')) }}
  {{ Form::text('name', $user->name, array('placeholder' => 'Introduce tu Nombre', 'class' => 'form-control', 'id'=>'inputLoRe')) }}
</div>
</div>

<div class="row">
<div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
  {{ Form::label('last_name', 'Apellidos', array('id' => 'CTlogRes')) }}
  {{ Form::text('last_name', $user->last_name, array('placeholder' => 'Introduce tus Apellidos', 'class' => 'form-control', 'id'=>'inputLoRe')) }}
</div>
</div>

<div class="row">
<div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
  {{ Form::label('phone', 'Telefono', array('id' => 'CTlogRes')) }}
  {{ Form::text('phone', $user->phone, array('placeholder' => 'Introduce tu Telefono', 'class' => 'form-control', 'id'=>'inputLoRe')) }}
</div>
</div>

<div class="row">
<div class="form-group col-md-offset-4 col-md-4 col-md-offset-4">
{{ Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
</div>
</div>


{{ Form::close() }}
<div class="row">
<div class="col-md-offset-4 col-md-4 col-md-offset-4">
    @include('flash::message')
    </div>
</div>

                    
                    
                </div>
            <!-- </div> -->
        </div>
    </div>

    
</div>
@endsection
