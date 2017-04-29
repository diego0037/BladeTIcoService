@extends('layouts.app')

@section('title', 'Colaboradores')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


@section('content')


<div class="container">
    
<div class="row">
<div class="col-md-offset-3 col-md-6 col-md-offset-3">
    @include('flash::message')
    </div>
</div>

    {{ Form::open(array('url' => '', 'method' => 'GET'), array('role' => 'form')) }}
    <div class="row">
      <div class="form-group  col-md-offset-3 col-md-4 ">

        {{ Form::text('search', null, array('placeholder' => 'Introduce tu Busqueda', 'class' => 'form-control','id' => 'inputBusqueda')) }}
      </div>

      <div class="form-group  col-md-offset-1 col-md-1 col-md-offset-3">
        {{ Form::button('Busqueda', array('type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnBusqueda')) }}
      </div>
    </div>
    {{ Form::close() }}

<div class="row">
  <div class="col-md-offset-2 col-md-8 col-md-offset-2">
    <table class="table table-striped">
     <thead>
       <tr>
         <th>COLABORADOR</th>
         <th>ACCIONES</th>
       </tr>
     </thead>
     <tbody>
       <?php
           foreach ($colaboradores as $key) {
             echo "<tr><td>".$key->user." ".$key->last."</td><td><a href='collaborator/$key->id' role='button' class='btn btn-info'>Información</a></td>
             </tr>";
           }
        ?>
     </tbody>
   </table>

  </div>
</div>
</div>

@endsection
