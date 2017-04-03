<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <figure class="image is-32x32">
                        <img :src="form.icon" alt="Ícone do item">
                    </figure>

                    <input type="text" class="input" v-model="form.name" placeholder="Nome" autofocus>
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
                                    <input type="text" class="input" v-model="form.username" placeholder="Adicione o nome de usuário">
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
                                <!-- TODO: adicionar na a checagem de força da senha ao digitar -->
                                <div class="control">
                                    <input type="text" class="input" v-model="form.password" placeholder="Adicione ou utilize o gerador de senhas">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Força da senha</label>
                                </div>

                                <div class="control">
                                    <strength :value="form.strength"></strength>
                                </div>
                            </div>
                        </div>
                    </div>

                    <password @generated="loadPassword" @checkedStrength="loadStrength"></password>
                </section>

                <section class="content-body">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">IP</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.ip" placeholder="Adicione o IP do dispositivo/software">
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
                                    <input type="text" class="input" v-model="form.dns" placeholder="Adicione o nome de domínio">
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
                                    <input type="text" class="input" v-model="form.equipment" placeholder="Adicione o tipo de equipamento">
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
    import Password from '../base/Password.vue';
    import Strength from '../base/Strength.vue';

    export default {
        components: { LoginInput, Create, Password, Strength },

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
            loadPassword(generatedPassword) {
                this.form.password = generatedPassword;
            },

            loadStrength(strength) {
                this.form.strength = strength;
            },

            onSubmit() {
                this.form.id_vault = this.getIdVault;

                this.form.post('/api/logins').then(response => this.$router.push('/logins'));
            }
        }
    }
</script>