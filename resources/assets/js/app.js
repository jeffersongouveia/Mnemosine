import './bootstrap';
import Vaults from './models/Vaults';
import Logins from './models/Logins';

Vue.component('login-list', require('./components/Logins.vue'));
Vue.component('login-details', require('./components/LoginDetails.vue'));

Vue.component('app-menu', require('./components/Menu.vue'));
Vue.component('dropdown-sort', require('./components/Sort.vue'));

window.app = new Vue({
    el: '#app',

    data: {
        vaults: new Vaults(),
        logins: new Logins(),
        loginSelected: {}
    },

    methods: {
        selectLogin(login) {
            this.loginSelected = login;
        }
    },

    created() {
        this.logins.get();
        this.vaults.get();
    }
});
