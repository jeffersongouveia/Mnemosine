import './bootstrap';
import Vaults from './models/Vaults';
import Logins from './models/Logins';

Vue.component('login-list', require('./components/Logins.vue'));
Vue.component('dropdown-sort', require('./components/Sort.vue'));
Vue.component('app-menu', require('./components/Menu.vue'));

new Vue({
    el: '#app',

    data: {
        vaults: new Vaults(),
        logins: new Logins()
    },

    methods: {
    	getFirstChar(word) {
    		return word.toString().charAt(0);
    	}
    },

    created() {
        this.vaults.get();
        this.logins.get();
    }
});
