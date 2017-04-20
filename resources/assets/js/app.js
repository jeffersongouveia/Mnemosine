import './bootstrap';
import Vaults from './models/Vaults';
import Router from './routes';

Vue.component('app-menu', require('./components/Menu.vue'));
Vue.component('user-menu', require('./components/UserMenu.vue'));

window.app = new Vue({
    el: '#app',

    router: Router,

    data: {
        vaults: new Vaults('/api/vaults')
    },

    computed: {
    	getVaults() {
    		return this.vaults.getData();
    	}
    },

    created() {
        this.vaults.get();
    }
});
