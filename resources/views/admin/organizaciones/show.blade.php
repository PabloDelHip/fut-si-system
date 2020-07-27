@extends('admin.layout')

@section('contenido')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mis Organizaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                               
    <!-- Main content -->
    <div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
    <organizacion-component></organizacion-component><!--Añadimos nuestro componente vuejs-->
    </div>
    <!-- /.content -->
  </div>

@stop
