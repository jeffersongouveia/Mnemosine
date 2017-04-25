import './bootstrap';
import Router from './routes';

Vue.component('app-menu', require('./components/Menu.vue'));
Vue.component('user-menu', require('./components/UserMenu.vue'));
Vue.component('vaults', require('./components/vaults/Vaults.vue'));

window.app = new Vue({
    el: '#app',
    router: Router
});
