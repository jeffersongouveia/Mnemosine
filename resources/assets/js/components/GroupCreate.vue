<template>
    <create title="Novo Grupo" :data="data" @submit="onSubmit">
        <field label="Cofres que pode ter acesso">
            <p class="control">
                <label class="checkbox" v-for="vault in getVaults">
                    <input type="checkbox" name="vaults" v-model="models.vaults" :value="vault.id">
                    {{ vault.name }}
                </label>
            </p>
        </field>

        <field label="Adicionar usuários ao novo grupo">
            <p class="control">
                <label class="checkbox" v-for="user in getUsers">
                    <input type="checkbox" name="users" v-model="models.users" :value="user.id">
                    {{ user.username }}
                </label>
            </p>
        </field>
    </create>
</template>

<script>
    import Users from '../models/Users';
    import Vaults from '../models/Vaults';

    import Create from './base/Create.vue';
    import Field from './base/Field.vue';

    export default {
        components: { Create, Field },

        data() {
            return {
                vaults: new Vaults('/api/vaults'),
                users: new Users('/api/users'),

                models: {
                    vaults: [],
                    users: []
                },

                data: [
                    {
                        label: 'Nome do grupo',
                        prop: 'name',
                        value: ''
                    },
                    {
                        label: '',
                        prop: 'deleted',
                        value: 'false'
                    }
                ]
            }
        },

        methods: {
            onSubmit(form) {
                form.push('groups', this.models.groups);
                form.push('vaults', this.models.vaults);

                form.post('/api/groups').then(response => this.$router.push('/logins'));
            }
        },

        computed: {
            getUsers() {
                return this.users.getData();
            },

            getVaults() {
                return this.vaults.getData();
            }
        },

        created() {
            this.users.get();
            this.vaults.get();
        }
    }
</script>