@extends('layout')

@section('contenido')
    <div style="width: 100%; height: 200px; background: url( {{ url('/images/fondo-partidos.jpg') }}) no-repeat center;">
        <div class="container">
            <div class="col-12 row d-flex align-items-center" style="height: 200px;">
                <div class="col-12 text-center">
                    <h2 class="titulo-resultados">Resultados</h2>
                    <div class="contenedor-breadcrumbs">
                        <ul>
                            <li class="active">
                                <a href="#"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li>
                                <a href="#">Partidos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TITULO --}}
    
    <section class="contendor-titulo-fecha-jornada" style="background: url( {{ url('/images/fondo-body.jpg') }}) no-repeat top center; background-attachment: fixed;">
        <div class="container">
            <div class="col-8 row">
                <div class="col-12 titulo-fecha-jornada">
                    <p>17 June, 2020  <span class="jornada">| Jornada 1 |</span>  <span>SUPER EURO LEAGUE</span></p>
                </div>

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

                <div class="col-12 row info-partido">
                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Pumas A</strong>
                            </div>
                            <div class="col-6 text-right p-0">
                                <span class="goles-resultado">2</span>
                                <span class="resultado-texto">Derrota</span>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(1 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-4 detalles-partido">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0 text-center">
                                <strong>Super Euro League</strong>
                                <p>Jornada numero: 1</p>
                                <img src="{{ url('/images/sp.png') }}">
                                <p>17 Octubre, 2020</p>
                                <p>Rana 228</p>
                                <a class="detalles-partido" href="#">DETALLES DEL PARTIDO</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row p-0 m-0">
                            <div class="col-6 text-left p-0">
                                <span class="goles-resultado" style="float: left;">3</span>
                                <span class="resultado-texto">Victoria</span>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ url('/images/equipo_1.png') }}" alt="equipo" style="width: 100%">
                                <strong class="nombre-equipo-resultado">Sporting</strong>
                            </div>
                            
                            <div class="col-12">
                                <ul>
                                    <li>Jose Iran <span>(2 gol)</span></li>
                                    <li>Jehu Oxte <span>(1 gol)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PARTIDO --}}

            </div>
        </div>
    </section>
@stop
