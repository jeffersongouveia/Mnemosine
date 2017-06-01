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
                <section class="content-body">
                    <field label="Usuário">
                        <input type="text" class="input" v-model="form.username" placeholder="Escolha seu username" autofocus>
                    </field>

                    <password @generated="loadData"></password>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <help-tip>
                                Permite que o usuário tenha acesso aos cofres que o grupo possui
                            </help-tip>

                            Grupos
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <label class="checkbox" v-for="group in getGroups">
                                        <input type="checkbox" name="groups" v-model="form.groups" :value="group.id">
                                        {{ group.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <help-tip>
                                Invés de dar acesso aos cofres do grupo, você pode definir diretamente quais os cofres que o usuário pode acessar
                                selecionando-os
                            </help-tip>

                            Cofres
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <label class="checkbox" v-for="vault in getVaults">
                                        <input type="checkbox" name="vaults" v-model="form.vaults" :value="vault.id">
                                        {{ vault.name }}
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-footer">
                    <field>
                        <button type="submit" class="button is-primary" :class="{ 'is-disabled': hasErrors() }">Salvar</button>
                    </field>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    import Groups from '../models/Groups';
    import Vaults from '../models/Vaults';

    import Field from './base/Field.vue';
    import Password from './base/Password.vue';
    import HelpTip from './utils/HelpTip.vue';

    export default {
        components: { Field, Password, HelpTip },

        data() {
            return {
                groups: new Groups('/api/groups'),
                vaults: new Vaults('/api/vaults'),

                form: new Form({
                    username: '',
                    password: '',
                    deleted: 'false',
                    groups: [],
                    vaults: []
                })
            }
        },

        methods: {
            isEmpty(v) {
                return v.length === 0;
            },

            hasErrors() {
                return this.isEmpty(this.form.username) || this.isEmpty(this.form.password) || (this.isEmpty(this.form.groups) && this.isEmpty(this.form.vaults));
            },

            loadData(password, strength) {
                this.form.password = password;
            },

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