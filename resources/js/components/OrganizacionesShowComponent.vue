<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 text-left">
                    <router-link :to="{ name:'alta_organizaciones'}">
                        <button type="button" class="btn bg-gradient-primary btn-lg">Agregar instalación</button>
                    </router-link>
                </div>
                <div class="col-12 mt-3">
                
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mis Organizaciones</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre Organización</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr v-for="(organizacion,index) in organizaciones" >
                                    <td style="width: 80%;"> {{ `${organizacion.titulo}` }}</td>
                                    <td>
                                        <router-link :to="{ name:'ver_info_organizacion', params: {id: organizacion._id }}">
                                            <button type="button" class="btn bg-gradient-success btn-sm">Ver</button>
                                        
                                        </router-link>
                                        <button type="button" @click="deleteOrganizacion(organizacion._id)" class="btn bg-gradient-danger btn-sm">Eliminar</button>
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
                organizaciones: []
            }
        },
        methods: {
            async selectOrganizaciones()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:8080/proyecto_fut-si/public/show-organizaciones')
                .then(response => {
                    this.organizaciones = response.data.organizaciones;
                    console.log(response.data.organizaciones);
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
            deleteOrganizacion(id)
            {

                this.$swal.fire({
                        icon: 'warning',
                        title: 'Eliminar',
                        text: '¿Seguro que quiere eliminar la organización?',
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar organización'})
                        .then((result) => {
                        if (result.value) {

                            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                            axios.delete('http://localhost:3000/organizacion/'+id)
                            .then(response => {

                                this.$swal.fire(
                                'Eliminado',
                                'Instalación eliminada de forma correcta.',
                                'success'
                                )
                                this.selectOrganizaciones();
                                
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
            let organizaciones = this.selectOrganizaciones();
            this.$store.state.datos_lat = '';
            this.$store.state.datos_lng = '';

        }
    }
</script>

