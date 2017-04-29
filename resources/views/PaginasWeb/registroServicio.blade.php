@extends('layouts.app')

@section('title', 'Registrar tu Servicio')

@section('content')

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TicoService</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('busqueda') }}"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
      <li><a href="{{ url('registro') }}"><span class="glyphicon glyphicon-user"></span> Registarse</a></li>
    </ul>
  </div>
</nav>

{{ Form::open(array('url' => 'api/collaborator', 'method' => 'POST'), array('role' => 'form')) }}
<div class="row">
  <div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
    {{ Form::label('id_service', 'Servicio') }}
    {{ Form::text('id_service', null, array('placeholder' => 'Introduce tu Servicio', 'class' => 'form-control')) }}
  </div>
</div>

<div class="row">
  <div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
    {{ Form::label('description', 'Descripción') }}
    {{ Form::textarea('description', null, array('placeholder' => 'Introduce tu Descripción', 'class' => 'form-control')) }}
  </div>
</div>

<div class="row">
  <div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
    {{ Form::label('availability', 'Disponibilidad') }}
    {{ Form::textarea('availability', null, array('placeholder' => 'Introduce tu Disponiblidad', 'class' => 'form-control')) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-offset-4 col-md-4 col-md-offset-4">

    @include('flash::message')

    {{ Form::button('Publica mi Servicio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
  </div>
</div>
{{ Form::close() }}



@endsection
