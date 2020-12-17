
let login = require('./components/auth/login.vue').default;
let home = require('./components/home.vue').default;
let adminhome = require('./components/adminhome.vue').default;
let inputbarang = require('./components/gudang/inputbarang.vue').default;
let listcat = require('./components/gudang/listcat.vue').default;
let ambilcat = require('./components/gudang/ambilcat.vue').default;
let request = require('./components/gudang/listrequest.vue').default

export const routes = [
    { path: '/', component: login , name: '/' },
    {path: '/home', component: home , name: 'home' },
    {path: '/request', component: request , name: 'request' },
    {path: '/adminhome', component: adminhome , name: 'adminhome' },
    {path: '/inputbarang', component: inputbarang , name: 'inputbarang' },
    {path: '/listcat', component: listcat , name: 'listcat' },
    {path: '/ambilcat', component: ambilcat , name: 'ambilcat' }
  ]