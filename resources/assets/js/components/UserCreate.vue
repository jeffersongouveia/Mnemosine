<!-- TODO: adicionar um campo pra marcar que os mesmos dados devem ser usados pra criar um usuário no RADIUS -->
<!-- TODO: adicionar um campo para caso o usuário queira dar outro username pro RADIUS que sera criado -->
<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <label class="title">Novo Usuário</label>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Nome completo</label>
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
                                    <label class="label">E-mail</label>
                                </div>

                                <div class="control">
                                    <input type="email" class="input" v-model="form.email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Senha</label>
                                </div>

                                <div class="control">
                                    <input type="password" class="input" v-model="form.password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Grupos</label>
                                </div>

                                <div class="control">
                                    <label class="checkbox" v-for="group in getGroups">
                                        <input type="checkbox" name="groups" v-model="form.groups" :value="group.id">
                                        {{ group.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Cofres</label>
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
    import Groups from '../models/Groups';
    import Vaults from '../models/Vaults';

    export default {
        data() {
            return {
                groups: new Groups('/api/groups'),
                vaults: new Vaults('/api/vaults'),

                form: new Form({
                    name: '',
                    email: '',

                    password: '',
                    strength: '',

                    groups: [],
                    vaults: []
                })
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/api/users').then(response => this.$router.push('/logins'));
            }
        },

        computed: {
            getGroups() {
                return this.groups.getData();
            },

            getVaults() {
                return this.vaults.getData();
            }
        },

        created() {
            this.groups.get();
            this.vaults.get();
        }
    }
</script>