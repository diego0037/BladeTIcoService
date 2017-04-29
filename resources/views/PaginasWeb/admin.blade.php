@extends('layouts.app')

@section('title', 'Administración')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<div class="row">
    <div class="col-md-offset-4 col-md-4 col-md-offset-4">
 <form class="navbar-form navbar-left" action="{{ url ('api/service') }}" method="get">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Busqueda Servicio">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
</form>
         </div>
</div>

<div class="row">
<div class="col-md-offset-3 col-md-6 col-md-offset-3">
    @include('flash::message')
    </div>
</div>


<div class="container">
    
    <div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Agregar Servicio</div>
            <div class="panel-body">
        <div class="row">
             {{ Form::open(array('url' => 'api/service', 'method' => 'POST'), array('role' => 'form')) }}
        <div class="form-group col-md-12">
            {{ Form::label('name', 'Servicio') }}
            {{ Form::text('name', null, array('placeholder' => 'Introduce el servicio Agregar', 'class' => 'form-control')) }}
            </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', 'Descripcion') }}
            {{ Form::textarea('description', null, array('placeholder' => 'Introduce la descripcion', 'class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-12">
            {{ Form::button('Agregar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
        </div>
            </div>
             </div>
        
        
        
        
        </div>
        

         <div class="col-md-4">
        
         <div class="panel panel-success">
             <div class="panel-heading">Actualizar Servicio</div>
              <div class="panel-body">
                <div class="row">
             {{ Form::open(array('url' => 'api/serviceUpdate' , 'method' => 'patch'), array('role' => 'form')) }}
        <div class="form-group col-md-12">
            {{ Form::label('name', 'Servicio') }}
            {{ Form::text('name',session('service'), array('class' => 'form-control')) }}
            </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', 'Descripcion') }}
            {{ Form::textarea('description',session('description'), array('placeholder' => 'Introduce la descripcion', 'class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-12">
            {{ Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                </div>
                    {{ Form::close() }}
        </div>
                   </div>
              </div>
        
        
        </div>
        

         <div class="col-md-4">
        
        <div class="panel panel-danger">
        <div class="panel-heading">Eliminar Servicio</div>
        <div class="panel-body">
                         {{ Form::open(array('url' => 'api/serviceDelete', 'method' => 'DELETE'), array('role' => 'form')) }}
        <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('name', 'Servicio') }}
            {{ Form::text('name',session('service'), array('placeholder' => 'Introduce el servicio a eliminar', 'class' => 'form-control', )) }}
            </div>
            <div class="form-group col-md-12">
            {{ Form::button('Eliminar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                </div>
         {{ Form::close() }}
        </div>
        </div>
            </div>
        
        </div>

    </div>

    
                             

</div>


@endsection

