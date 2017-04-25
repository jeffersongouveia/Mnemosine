<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <label class="title">Novo Grupo</label>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Nome do grupo</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.name">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Cofres que pode ter acesso</label>
                                </div>

                                <div class="control">
                                    <label class="checkbox" v-for="vault in getVaults">
                                        <input type="checkbox" name="vaults" v-model="form.vaults" :value="vault.id">
                                        {{ vault.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Adicionar usuários ao novo grupo</label>
                                </div>

                                <div class="control">
                                    <label class="checkbox" v-for="user in getUsers">
                                        <input type="checkbox" name="users" v-model="form.users" :value="user.id">
                                        {{ user.username }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-body"></section>

                <section class="content-footer">
                    <button type="submit" class="button is-primary">Salvar</button>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    import Users from '../models/Users';
    import Vaults from '../models/Vaults';

    export default {
        data() {
            return {
                vaults: new Vaults('/api/vaults'),
                users: new Users('/api/users'),

                form: new Form({
                    name: '',

                    vaults: [],
                    users: []
                })
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/api/groups').then(response => this.$router.push('/logins'));
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