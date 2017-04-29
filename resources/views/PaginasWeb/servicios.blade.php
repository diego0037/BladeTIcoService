@extends('layouts.app')

@section('title', 'Servicios')

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<div class="container">



 {{ Form::open(array('url' => 'api/searchServ', 'method' => 'GET'), array('role' => 'form')) }}
    <div class="row">
      <div class="form-group  col-md-offset-3 col-md-4 ">

        {{ Form::text('search', null, array('placeholder' => 'Introduzca Servicio', 'class' => 'form-control','id' => 'inputBusqueda')) }}
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
         <th>SERVICIO</th>
         <th>DESCRIPCIÓN</th>
         <th>ACCIONES</th>
       </tr>
     </thead>
     <tbody>
       <?php
           foreach ($services as $key) {
             echo "<tr><td>".$key->name."</td><td>".$key->description."</td>
             <td><a href='service/$key->id' role='button' class='btn btn-success'>Agregar</a></td>
             </tr>";
           }
        ?>
     </tbody>
   </table>

  </div>
</div>

</div>
@endsection
