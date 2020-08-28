<template>
    <div class="row col-12">
        <div class="form-inline autocomplete_map col-12">
            <gmap-autocomplete
                class="form-control"
                @place_changed="setPlace"
                style="width: 100%;">
            </gmap-autocomplete>
        </div>
        <gmap-map ref="mapRef"
            :center="center"
            :zoom="16"
            style="width:100%;  height: 400px;">
            <gmap-marker
                :key="index"
                v-for="(m, index) in markers"
                :position="m.position"
                :draggable="true"
                @dragend="gMapFunc($event.latLng)"
                @click="center=m.position">
            </gmap-marker>
        </gmap-map>
    </div>
    <!-- <input  -->
    
</template>

<script>
    import {gmapApi} from 'vue2-google-maps';
    
    export default {
        props: ['datosLat','datosLng'],
        data() {
            return{
                center: '',
                markers: [],
                places: [],
                currentPlace: null,
                direccion:"",
                direccion_map:"",
                jdata:"",
                latitud: '',
                longitud: '',
                datos: []
            }
        },
        methods: {

            async buscarDatos() {
                this.datos = {
                    latitud: this.latitud,
                    longitud: this.longitud,
                };
                //console.log("obvio jalo perro");
                this.$emit('onLatLng', this.datos);
            },
            gMapFunc(evnt) {
                this.jdata = {"geo": {"lat":evnt.lat(), "lng":evnt.lng()}};
                this.direccion_map = this.jdata.geo.lat + '||' + this.jdata.geo.lng;
                // console.log();
                // console.log(this.jdata.geo.lng);
                Vue.$geocoder.setDefaultMode('lat-lng');
                var latLngObj = {
                    lat: this.jdata.geo.lat,
                    lng: this.jdata.geo.lng
                }
                Vue.$geocoder.send(latLngObj, response => { this.direccion = response.results[0].formatted_address; });
                
                this.latitud = this.jdata.geo.lat
                ;
                this.longitud = this.jdata.geo.lng;
                this.buscarDatos();
            },
            setPlace(place) {
                this.currentPlace = place;
                this.addMarker();
                
            },
            addMarker() {
                if (this.currentPlace) {
                    console.log(this.currentPlace);
                    const marker = {
                        lat: this.currentPlace.geometry.location.lat(),
                        lng: this.currentPlace.geometry.location.lng()
                    };
                    this.latitud = this.currentPlace.geometry.location.lat();
                    this.longitud = this.currentPlace.geometry.location.lng();
                    
                    Vue.$geocoder.setDefaultMode('lat-lng');
                    Vue.$geocoder.send(marker, response => {this.direccion=response.results[0].formatted_address });
                    this.markers=[];
                    this.markers.push({ position: marker });
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;

                    this.buscarDatos();
                    
                }
                else
                {
                    
                    this.latitud = this.$store.state.datos_lat;
                    this.longitud = this.$store.state.datos_lng;
                    const marker = {
                        lat: Number(this.latitud),
                        lng: Number(this.longitud)
                    };
                    console.log(marker);
                    
                    Vue.$geocoder.setDefaultMode('lat-lng');
                    Vue.$geocoder.send(marker, response => {this.direccion=response.results[0].formatted_address });
                    this.markers=[];
                    this.markers.push({ position: marker });
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;

                    this.buscarDatos();
                }
            },
            geolocate: function() {
                navigator.geolocation.getCurrentPosition(position => {
                    this.center = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                });
                
            },
        },
        watch: {
                '$store.state.datos_lat': function() {

                    this.latitud = this.$store.state.datos_lat;
                    this.longitud = this.$store.state.datos_lng;
                    this.addMarker();
                    this.buscarDatos();
                    this.$refs.mapRef.$mapPromise.then((map) => {
                        map.panTo({lat: Number(this.$store.state.datos_lat), lng: Number(this.$store.state.datos_lng)})
                    })
                
                
            }
        },
        mounted() {
            this.geolocate();
            this.buscarDatos();
            this.addMarker();
            console.log('Component mounted.')
            
        }
    }
</script>
