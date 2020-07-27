<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 text-left">
                    <router-link :to="{ name:'alta_instalaciones'}">
                        <button type="button" class="btn bg-gradient-primary btn-lg">Agregar instalación</button>
                    </router-link>
                </div>
                <div class="col-12 mt-3">
                
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mis Instalaciones</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre Instalación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr v-for="(instalacion,index) in instalaciones" >
                                    <td style="width: 80%;"> {{ `${instalacion.nombre}` }}</td>
                                    <td>
                                        <router-link :to="{ name:'ver_info_instalacion', params: {id: instalacion._id }}">
                                            <button type="button" class="btn bg-gradient-success btn-sm">Ver</button>
                                        
                                        </router-link>
                                        <button type="button" @click="deleteInstalacion(instalacion._id)" class="btn bg-gradient-danger btn-sm">Eliminar</button>
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>

    export default {
        data() {
            return {
                instalaciones: []
            }
        },
        methods: {
            async selectInstalaciones()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:3000/instalacion')
                .then(response => {
                    this.instalaciones = response.data.instalacion;
                    console.log(this.instalaciones)
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
            deleteInstalacion(id)
            {

                this.$swal.fire({
                        icon: 'warning',
                        title: 'Eliminar',
                        text: '¿Seguro que quiere eliminar la instalación?',
                        showCancelButton: true,
                        CancelButtonText: 'Cancelar',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar instalación'})
                        .then((result) => {
                        if (result.value) {

                            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                            axios.delete('http://localhost:3000/instalacion/'+id)
                            .then(response => {

                                this.$swal.fire(
                                'Eliminado',
                                'Instalación eliminada de forma correcta.',
                                'success'
                                )
                                this.selectInstalaciones();
                                
                            })
                            .catch(e => {
                                // Podemos mostrar los errores en la consola
                                alert("Ocurrio un error al eliminar la instalación");
                                console.log(e);
                            })
                        }
                    });
            }
        },
        mounted(){
            this.selectInstalaciones();
            this.$store.state.datos_lat = '';
            this.$store.state.datos_lng = '';
            console.log("probando ando");

            
                var theCookies = document.cookie.split(';');
                var aString = [];
                for (var i = 1 ; i <= theCookies.length; i++) {
                    aString.push(theCookies[i-1])
                    
                }
                //aString;
            
            //var x = document.cookie; 
            console.log(aString);

        }
    }
</script>

