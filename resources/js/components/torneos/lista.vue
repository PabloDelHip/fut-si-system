<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 text-left">
                    <router-link :to="{ name:'alta_torneo'}">
                        <button type="button" class="btn bg-gradient-primary btn-lg">Agregar Torneo</button>
                    </router-link>
                </div>
                <div class="col-12 mt-3">
                
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mis Torneos</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre Torneo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr v-for="(torneo) in torneos" :key="torneo._id" >
                                    <td style="width: 80%;"> {{ `${torneo.nombre}` }}</td>
                                    <td>
                                        <router-link :to="{ name:'ver_torneo', params: {id: torneo._id }}">
                                            <button type="button" class="btn bg-gradient-success btn-sm">Ver</button>
                                        
                                        </router-link>
                                        <button type="button" @click="deleteTorneo(torneo._id)" class="btn bg-gradient-danger btn-sm">Eliminar</button>
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
                torneos: []
            }
        },
        methods: {
            async selectTorneos()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:8080/proyecto_fut-si/public/torneos/show')
                .then(response => {
                    this.torneos = response.data.torneo;
                    console.log(response.data);
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
            deleteTorneo(id)
            {

                this.$swal.fire({
                        icon: 'warning',
                        title: 'Eliminar',
                        text: '¿Seguro que quiere eliminar el torneo?',
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar torneo'})
                        .then((result) => {
                        if (result.value) {

                            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                            axios.delete('http://localhost:3000/torneo/'+id)
                            .then(response => {

                                this.$swal.fire(
                                'Eliminado',
                                'Torneo eliminado de forma correcta.',
                                'success'
                                )
                                this.selectTorneos();
                                
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
            let categoria = this.selectTorneos();
        }
    }
</script>

