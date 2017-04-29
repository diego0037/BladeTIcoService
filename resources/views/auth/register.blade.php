@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- <div class="panel panel-default"> -->
                <!-- <div class="panel-heading">Registro de usuario</div> -->
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('api/user') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" id="CTlogRes" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="name"  id="CTlogRes" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="name" id="CTlogRes" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" id="CTlogRes" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" id="CTlogRes" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" id="CTlogRes" class="col-md-4 control-label">Contraseña de Confirmación</label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                    @include('flash::message')

                    
                    
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
