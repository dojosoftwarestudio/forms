require('./bootstrap');
window.Vue = require('vue');
import Vuetify from 'vuetify';
Vue.use(Vuetify);

import store from './store'
import router from './router'
import common from './common'
Vue.mixin(common)

Vue.component('admin-component', require('./components/AdminTemplate.vue').default);


router.beforeEach((to, from, next) =>{
    const requiresAuth = to.matched.some( record => record.meta.requiresAuth)
    const currentUser = store.state.currentUser
    if(requiresAuth && !currentUser){
        next('/login')
    }else if(to.path == '/login' && currentUser){
        next('/')
    }else{
        next()
    }

})
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
    store,
});
