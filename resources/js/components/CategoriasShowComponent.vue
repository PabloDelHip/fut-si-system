<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 text-left">
                    <router-link :to="{ name:'alta_categoria'}">
                        <button type="button" class="btn bg-gradient-primary btn-lg">Agregar Categorias</button>
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
                            
                                <tr v-for="(categoria) in categorias" :key="categoria._id" >
                                    <td style="width: 80%;"> {{ `${categoria.titulo}` }}</td>
                                    <td>
                                        <router-link :to="{ name:'ver_info_categoria', params: {id: categoria._id }}">
                                            <button type="button" class="btn bg-gradient-success btn-sm">Ver</button>
                                        
                                        </router-link>
                                        <button type="button" @click="deleteCategoria(categoria._id)" class="btn bg-gradient-danger btn-sm">Eliminar</button>
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
                categorias: []
            }
        },
        methods: {
            async selectCategorias()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:8080/proyecto_fut-si/public/show-categorias')
                .then(response => {
                    this.categorias = response.data.categoria;
                    console.log(response.data.categoria);
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
            deleteCategoria(id)
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
                            axios.delete('http://localhost:3000/categoria/'+id)
                            .then(response => {

                                this.$swal.fire(
                                'Eliminado',
                                'Instalación eliminada de forma correcta.',
                                'success'
                                )
                                this.selectCategorias();
                                
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
            let categoria = this.selectCategorias();
        }
    }
</script>

