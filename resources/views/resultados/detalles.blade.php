@extends('layout')

@section('contenido')
    <section class="hero-detalle" style="width: 100%; background: url( {{ url('/images/fondo-detalles-partido.jpg') }}) no-repeat center;">
        <h5>SUPER EURO LEAGUE</h5>
        <p>Jornada numero: 1</p>
        <ul class="teamz">
            <li class="mt-left"><img src="{{ url('/images/equipo_1.png') }}" alt=""> <strong>North Carolina</strong> </li>
            <li class="mt-center-score">
               <div class="score-left"> <span>2</span> <strong>Derrota</strong> </div>
               <div class="score-right"> <span>3</span> <strong>Victoria</strong> </div>
            </li>
            <li class="mt-right"> <img src="{{ url('/images/equipo_2.png') }}" alt=""> <strong>Indy Eleven</strong> </li>
        </ul>

        <div class="col-12 row">
            <div class="col-6 text-right">
                <a href="#" class="text-right">Jose Iran <span>(2 gol)</span></a>
                <br>
                <a href="#" class="text-right">Jehu Oxte <span>(1 gol)</span></a>
            </div>
            <div class="col-6 text-left" style="padding-left: 46px;">
                <a href="#" class="text-left">Jose Iran <span>(2 gol)</span></a>
                <br>
                <a href="#" class="text-left">Jehu Oxte <span>(1 gol)</span></a>
            </div>
        </div>
        <div class="col-12 row detalles-info-partido m-0 mt-5 ">
            <div class="col-12 text-center">
                <p><span>17 octuble</span> | <span>15:30</span> | <span>Campo 228</span></p>
            </div>
        </div>
    </section>

    <section style="padding: 80px 0; background: url( {{ url('/images/fondo-body.jpg') }}) no-repeat top center; background-attachment: fixed;">
        <div class="container">
            <div class="col-12 row">
              <div class="col-8">
                <div class="row col-12 estadisticas-juego">
                  <h4>ESTADÍSTICAS DEL JUEGO</h4>
                  <div class="point-table-widget">
                      <table>
                          <tbody class="text-center">
                              <tr>
                                  <td>4</td>
                                  <td><strong>Goles</strong></td>
                                  <td>1</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td><strong>Tarjetas Amarillas</strong></td>
                                  <td>1</td>
                              </tr>
                              <tr>
                                  <td>7</td>
                                  <td><strong>Tarjetas Rojas</strong></td>
                                  <td>9</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
                {{-- ESTADISTICAS DEL JUEGO --}}

                <div class="row col-12 estadisticas-juego mt-5">
                  <h4>DETALLES DEL PARTIDO</h4>
                  <div class="txt">
                      <p>
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus.
    
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt labore at magnam
                        Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                      </p>
                  </div>
                </div>
                {{-- DETALLES DEL PARTIDO --}}

                <div class="row col-12 estadisticas-juego mt-5">
                  <h4>Imagenes del partido</h4>
                  <div>
                      <img src="{{ url('/images/nlarge5.jpg') }}" alt="images" style="width: 100%;">
                  </div>
                </div>
                {{-- DETALLES DEL PARTIDO --}}
              </div>
              {{-- DETALLES --}}

              <div class="col-4 sidebar-detalles p-4">
                <div class="col-12">
                  <img src="{{ url('/images/sideadbanner1.png') }}" alt="publicidad" style="width: 100%;">
                </div>
                {{-- Publicidad --}}

                <div class="row m-0 col-12 mt-5">
                  <h4>Tabla de posiciones</h4>
                  <div class="point-table-widget col-12 p-0 m-0">
                      <table>
                        <thead>
                          <tr>
                            <th>P</th>
                            <th>Team</th>
                            <th>P</th>
                            <th>W</th>
                            <th>Pts</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><strong> Bethlehem</strong></td>
                            <td>22</td>
                            <td>22</td>
                            <td><strong>140</strong></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td><strong>Chirston Battery</strong></td>
                            <td>19</td>
                            <td>19</td>

                            <td><strong>138</strong></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td> <strong>Charlotte</strong></td>
                            <td>18</td>
                            <td>19</td>
                            <td><strong>130</strong></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td> <strong>FC Cincinnati</strong></td>
                            <td>17</td>
                            <td>19</td>
                            <td><strong>126</strong></td>
                          </tr>
                          <tr style="background-color: #d5ef00a6;">
                            <td>5</td>
                            <td> <strong>Indy Eleven</strong></td>
                            <td>16</td>
                            <td>19</td>
                            <td><strong>110</strong></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td> <strong>Louisville City FC</strong></td>
                            <td>15</td>
                            <td>19</td>
                            <td><strong>108</strong></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td> <strong>Nashville SC</strong></td>
                            <td>14</td>
                            <td>19</td>
                            <td><strong>106</strong></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td><strong>NYK Red Bulls</strong></td>
                            <td>13</td>
                            <td>19</td>
                            <td><strong>100</strong></td>
                          </tr>
                          <tr style="background-color: #d5ef00a6;">
                            <td>9</td>
                            <td> <strong>North Carolina</strong></td>
                            <td>12</td>
                            <td>19</td>
                            <td><strong>80</strong></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td> <strong>Ottawa Fury</strong></td>
                            <td>11</td>
                            <td>19</td>
                            <td><strong>76</strong></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
                {{-- TABLA POSICIONES --}}

                <div class="row m-0 col-12 mt-5">
                  <h4>Patrocinadores del torneo</h4>
                  <ul class="match-sponsors">
                    <li> <a href="#"><img src="{{ url('/images/sitelogos1.png') }}" alt=""></a> </li>
                    <li> <a href="#"><img src="{{ url('/images/sitelogos2.png') }}" alt=""></a> </li>
                    <li> <a href="#"><img src="{{ url('/images/sitelogos3.png') }}" alt=""></a> </li>
                    <li> <a href="#"><img src="{{ url('/images/sitelogos4.png') }}" alt=""></a> </li>
                 </ul>
                </div>
                {{-- PaTROCINADORES DEL TORNEO --}}

                {{-- <div class="col-12 mt-5">
                  <h4>Patrocinadores</h4>
                </div> --}}
              </div>
            </div>

            

            
        </div>
    </section>
@stop
