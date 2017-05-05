<!-- TODO: adicionar um campo pra marcar que os mesmos dados devem ser usados pra criar um usuário no RADIUS -->
<!-- TODO: adicionar um campo para caso o usuário queira dar outro username pro RADIUS que sera criado -->
<template>
    <create title="Novo Usuário" :data="data" @submit="onSubmit">
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
                            <input type="checkbox" name="groups" v-model="models.groups" :value="group.id">
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
                            <input type="checkbox" name="vaults" v-model="models.vaults" :value="vault.id">
                            {{ vault.name }}
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </create>
</template>

<script>
    import Groups from '../models/Groups';
    import Vaults from '../models/Vaults';

    import Create from './base/Create.vue';
    import HelpTip from './utils/HelpTip.vue';

    export default {
        components: { Create, HelpTip },

        data() {
            return {
                groups: new Groups('/api/groups'),
                vaults: new Vaults('/api/vaults'),

                models: {
                    groups: [],
                    vaults: []
                },

                data: [
                    {
                        label: 'Usuário',
                        prop: 'username',
                        value: ''
                    },
                    {
                        label: 'Senha',
                        prop: 'password',
                        value: '',
                        type: 'password'
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
            isEmpty(v) {
                return v.length === 0;
            },

            hasErrors() {
                return this.isEmpty(this.form.username) || this.isEmpty(this.form.password) || this.isEmpty(this.form.groups) || this.isEmpty(this.form.vaults);
            },

            onSubmit(form) {
                form.push('groups', this.models.groups);
                form.push('vaults', this.models.vaults);

                form.post('/api/users').then(response => this.$router.push('/logins'));
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