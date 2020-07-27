<template>
    <div class="row col-12">
        
        <div id="my-strictly-unique-vue-upload-multiple-image" style="display: flex; justify-content: center; margin: 0 auto;">
            <vue-upload-multiple-image
                dragText="Seleccionar Imagenes de la instalación"
                browseText="(opcional)"
                :maxImage="max_image"
                @upload-success="uploadImageSuccess"
                @before-remove="beforeRemove"
                @edit-image="editImage"
                @data-change="dataChange"
                :data-images="images"
                ref="imagenes">
            </vue-upload-multiple-image>
        </div>
        
    </div>
</template>

<script>
    import VueUploadMultipleImage from 'vue-upload-multiple-image';
    
    export default {
        components: {VueUploadMultipleImage},
        data () {
            return {
            images: [],
            max_image:10
            }
        },
        watch: {
            
                '$store.state.images_instalaciones': function() {
               
                this.index = this.$store.state.images_instalaciones.imagenes_instalaciones.length;
                for(var i=0; i < this.index; i++)
                {
                    this.images.push({
                        path: 'http://localhost:3000/'+this.$store.state.images_instalaciones.imagenes_instalaciones[i].nombre,
                        default: 1,
                        highlight: 1,
                    });
                   
                }
               
                let fileList = this.$refs.imagenes.dataImages;
                let index = this.$refs.imagenes.dataImages.length;
               
                this.uploadImageSuccess("",index,fileList);
                
            }
        },
        methods: {

            uploadImageSuccess(formData, index, fileList) {
                this.$emit('onImage', fileList,index);
                
            },
            beforeRemove (index, done, fileList) {
                
                var r = confirm("remove image")
                if (r == true) {
                    done()
                } else {
                }
            },
            editImage (formData, index, fileList) {
                //console.log('edit data', formData, index, fileList)
            },
            dataChange (data) {
                //console.log(data)
            }
        },
    }
</script>


