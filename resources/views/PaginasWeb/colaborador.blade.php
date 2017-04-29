@extends('layouts.app')

@section('title', 'Colaborador')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')
<div class="site-wrapper">
  <div class="site-wrapper-inner">
<img src="{{URL::asset('/image/stallman.jpg')}}" alt="profile Pic" height="100" width="100">
<div class="col-md-2"></div>
<div class="col-md-8">
  <table class="table table-striped">

   <tbody>
     <?php
           echo "<tr><td>COLABORADOR</td><td>$collaborator->name $collaborator->last_name</td></tr>
                  <tr><td>SERVICIO</td><td>$collaborator->service</td></tr>
                  <tr><td>CONTACTO</td><td>$collaborator->phone</td></tr>
                  <tr><td>DISPONIBILIDAD</td><td>$collaborator->availability</td></tr>
                  <tr><td>DESCRIPCIÓN</td><td>$collaborator->description</td></tr></br></br>";
      ?>
   </tbody>
 </table>

</div>
</div>
<div>
  <h2>Área de comentarios</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">COMENTAR</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comentario</h4>
        </div>
        <div class="modal-body">

          {{ Form::open(array('url' => 'api/comment', 'method' => 'POST'), array('role' => 'form')) }}

          <div class="row">
          <div class="form-group col-md-12">
            {{ Form::textarea('comment', null, array('class' => 'form-control')) }}
          </div>
          </div>

          <div class="row">
          <div hidden class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
            {{ Form::text('coll_id', Request::segment(3), array('class' => 'form-control')) }}
          </div>
          </div>

          <div class="row">
          <div class="form-group col-md-offset-4 col-md-4 col-md-offset-4">

          {{ Form::button('Publica mi Comentario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
          </div>
          </div>
          {{ Form::close() }}
          <p>Procura que tu comentario no dañe la integridad del colaborador</p>
        </div>
        <div hidden class="modal-footer">
          <input type="text" name="" value="">
        </div>
      </div>

    </div>
  </div>

</div>



<table class="table table-striped">
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
  <thead>
    <tr>
      <th>USUARIO</th>
      <th>COMENTARIO</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($comments as $key) {
        echo "<tr><td>".$key->user.' '.$key->last."</td><td>".$key->comment."</td></tr>";
      }
     ?>
  </tbody>
</table>

</div>
@endsection
