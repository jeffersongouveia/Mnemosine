<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <figure class="image is-32x32">
                        <img src="/img/icons/mikrotik.png" alt="Ícone do item">
                    </figure>

                    <input type="text" class="input" v-model="form.shortname" placeholder="Nome" autofocus>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">IP</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.nasname" placeholder="Adicione o IP de acesso ao dispositivo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Porta</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.ports" placeholder="Porta de acesso do RADIUS">
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
                                    <input type="text" class="input" v-model="form.secret" placeholder="Adicione ou utilize o gerador de senhas">
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
                                    <strength :value="strength"></strength>
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
                                    <label class="label">Equipamento</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.type" placeholder="Selecione o tipo do equipamento">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <div class="control is-horizontal">
                                <div class="control-label">
                                    <label class="label">Descrição</label>
                                </div>

                                <div class="control">
                                    <input type="text" class="input" v-model="form.description" placeholder="Opcional">
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
    import Create from '../base/Create.vue';
    import Password from '../base/Password.vue';
    import Strength from '../base/Strength.vue';

    export default {
        components: { Create, Password, Strength },

        data() {
            return {
                form: new Form({
                    nasname: '',
                    shortname: '',
                    type: '',
                    ports: 1812,
                    secret: '',
                    description: '',
                }),

                strength: 0
            }
        },

        methods: {
            loadPassword(generatedPassword) {
                this.form.secret = generatedPassword;
            },

            loadStrength(strength) {
                this.strength = strength;
            },

            onSubmit() {
                this.form.post('/api/equipments').then(response => this.$router.push('/equipments'));
            }
        }
    }
</script>