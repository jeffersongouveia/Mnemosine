<template>
    <columns>
        <div slot="options">
            <div class="control has-icon">
                <input type="text" class="input" placeholder="Pesquisar">
                <span class="icon is-small">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <dropdown-sort></dropdown-sort>

            <login-list :items="logins" @select="selectLogin"></login-list>
        </div>

        <div>
            <login-details :login="loginSelected"></login-details>
        </div>
    </columns>
</template>

<script>
    import Logins from '../models/Logins';

    import Columns from './Columns.vue';
    import Sort from './Sort.vue';
    import LoginsList from './LoginsList.vue';
    import LoginDetails from './LoginDetails.vue';

    export default {
        components: {
            'columns': Columns,
            'dropdown-sort': Sort,
            'login-list': LoginsList,
            'login-details': LoginDetails
        },

        data() {
            return {
                logins: new Logins(),
                loginSelected: {}
            }
        },

        methods: {
            selectLogin(login) {
                this.loginSelected = login;
            }
        },

        created() {
            this.logins.get();
        }
    }
</script>