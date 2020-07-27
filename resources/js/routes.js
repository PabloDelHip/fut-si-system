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
        }
        
    ],
    mode: "history"
})