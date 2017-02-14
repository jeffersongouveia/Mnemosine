import './bootstrap';
import Vaults from './models/Vaults';
import Router from './routes';

Vue.component('app-menu', require('./components/Menu.vue'));

window.app = new Vue({
    el: '#app',

    router: Router,

    data: {
        vaults: new Vaults()
    },

    created() {
        this.vaults.get();
    }
});
