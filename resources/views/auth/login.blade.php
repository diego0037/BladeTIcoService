
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="panellogin">
                <!-- <div class="panel-heading">Login</div> -->
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('api/user/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label  for="email" id="CTlogRes" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="inputLoRe" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" id="CTlogRes" class="col-md-4 control-label" id="CTlogRe">Contraseña</label>

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
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" id="btnLogin" class="btn btn-primary">
                                    Login
                                </button>


                            </div>
                        </div>
                    </form>
                      @include('flash::message')
                </div>
        </div>
    </div>
</div>
@endsection
