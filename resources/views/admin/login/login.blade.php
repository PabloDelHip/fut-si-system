@extends('admin.layout-login')

@section('contenido')

    <div class="login-box">
        <div class="login-logo">
        <a href="../../index2.html"><b>Login </b>Fut-si</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingresar datos para iniciar sesión</p>

            <div class="col-12">
                @if(Session::get('message'))
                  <div class="alert alert-danger">
                    {{ Session::get('message')  }}
                  </div>
                @endif
            </div>
    
            <form action="{{ route('datos-login') }}" method="POST">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                    Remember Me
                    </label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
    
            <p class="mb-1">
                <a href="forgot-password.html">Recuperar mi contraseña</a>
            </p>
        </div>
        <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

@stop
