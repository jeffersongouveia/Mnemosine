<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <figure class="image is-32x32">
                        <img :src="form.icon" alt="Ícone do item">
                    </figure>

                    <input type="text" class="input" v-model="form.name" autofocus>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Usuário</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.username">
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
                </section>

                <section class="content-body">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">IP</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.ip">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">DNS</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.dns">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Equipamento</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.equipment">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-footer">
                    <button type="submit" class="button is-primary">Salvar</button>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    import LoginInput from './LoginInput.vue';
    import Create from '../base/Create.vue';

    export default {
        components: { LoginInput, Create },

        data() {
            return {
                form: new Form({
                    id_vault: this.getIdVault,

                    icon: '/img/icons/mikrotik.png',
                    name: '',

                    username: '',
                    password: '',
                    strength: 0,

                    ip: '',
                    dns: '',
                    equipment: '',

                    favorite: false,
                    deleted: false
                })
            }
        },

        computed: {
            getIdVault() {
                return document.getElementById('vaults').value;
            }
        },

        methods: {
            onSubmit() {
                this.form.id_vault = this.getIdVault;

                this.form.post('/api/logins').then(response => this.$router.push('/logins'));
            }
        }
    }
</script>