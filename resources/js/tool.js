Nova.booting((Vue, router) => {
    Vue.config.devtools = true

    router.addRoutes([
        {
            name: 'nova-algolia',
            path: '/nova-algolia',
            component: require('./views/Index'),
        }
    ])
})
