import VueRouter from 'vue-router';


let routes = [
    {
        path: '/dashboard',
        component: require('./views/dashboard').default
    },
    {
        path: '/users',
        component: require('./views/users').default
    },
    {
        path: '/companies',
        component: require('./views/company').default,
        props: true
    },
    {
        path: '/home',
        component: require('./views/home').default,
        props: true
    },
    {
        path: '/subsidiaries',
        component: require('./views/subsidiaries').default,
        props: true
    },
    /*{
        path: '/shifts',
        component: require('./views/shifts').default,
        props: true
    },*/

];


export default new VueRouter({
    base: '/admin',
    mode: 'history',
    routes,
    linkActiveClass: 'active'
});
