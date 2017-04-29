@extends('layouts.app')

@section('title', 'Administración')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<div class="row">
<div class="col-md-offset-3 col-md-6 col-md-offset-3">
    @include('flash::message')
    </div>
</div>


<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Servicio</th>     
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
          <?php
           foreach ($servicios as $key) {
             echo "<tr class='info'><td>".$key->name."</td><td><a href='serviceDelCol/{$key->idCol}' role='button' 
                 class='btn btn-danger'>Eliminar</a></td></tr>";
           }
        ?>
        </tbody>
    </table>
</div>

@endsection

