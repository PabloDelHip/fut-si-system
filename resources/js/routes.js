import Vue    from 'vue'
import Router from 'vue-router'


Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/proyecto_fut-si/public/panel-fut-si/instalaciones',
            name: 'ver_instalaciones',
            component: require('./components/VerInstalacionesComponent').default
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/alta/instalaciones',
            name: 'alta_instalaciones',
            component: require('./components/ExampleComponent').default
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/ver-instalacion/:id',
            name: 'ver_info_instalacion',
            component: require('./components/ExampleComponent').default,
            props: true
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/organizaciones',
            name: 'ver_organizaciones',
            component: require('./components/OrganizacionesShowComponent').default,
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/alta/organizacion',
            name: 'alta_organizaciones',
            component: require('./components/OrganizacionFormComponent').default,
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/ver-organizacion/:id',
            name: 'ver_info_organizacion',
            component: require('./components/OrganizacionFormComponent').default,
            props: true
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/alta/categoria',
            name: 'alta_categoria',
            component: require('./components/CategoriaFormComponent').default,
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/ver-categoria/:id',
            name: 'ver_info_categoria',
            component: require('./components/CategoriaFormComponent').default,
            props: true
        },
        {
            path: '/proyecto_fut-si/public/panel-fut-si/categorias',
            name: 'ver_categorias',
            component: require('./components/CategoriasShowComponent').default,
        },
        
    ],
    mode: "history"
})