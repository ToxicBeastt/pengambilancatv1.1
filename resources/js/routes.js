
let login = require('./components/auth/login.vue').default;
let home = require('./components/home.vue').default;
let adminhome = require('./components/adminhome.vue').default;
let inputbarang = require('./components/gudang/inputbarang.vue').default;
let inputresep = require('./components/gudang/inputresep.vue').default;
let listcat = require('./components/gudang/listcat.vue').default;
let listresep = require('./components/gudang/listresep.vue').default;
let ambilcat = require('./components/gudang/ambilcat.vue').default;
let request = require('./components/gudang/listrequest.vue').default;
let editresep = require('./components/gudang/editresep.vue').default;

export const routes = [
    //BasedPage
    { path: '/', component: login , name: '/' },
    {path: '/home', component: home , name: 'home' },
    {path: '/adminhome', component: adminhome , name: 'adminhome' },
    //Barang
    {path: '/inputbarang', component: inputbarang , name: 'inputbarang' },
    {path: '/listcat', component: listcat , name: 'listcat' },
    //Resep
    {path: '/inputresep', component: inputresep , name: 'inputresep' },
    {path: '/listresep', component: listresep , name: 'listresep' },
    {path: '/editresep/:id', component: editresep , name: 'editresep' },
    //Request
    {path: '/ambilcat', component: ambilcat , name: 'ambilcat' },
    {path: '/request', component: request , name: 'request' },
    
  ]