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
                    <div class="field is-horizontal">
                        <div class="field-label">IP</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.nasname" placeholder="Adicione o IP de acesso ao dispositivo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">Porta</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.ports" placeholder="Porta de acesso do RADIUS">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">Senha</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.secret" placeholder="Adicione ou utilize o gerador de senhas">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">Força da senha</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <strength :value="strength"></strength>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label"></div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <password @generated="loadPassword" @checkedStrength="loadStrength"></password>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-body">
                    <div class="field is-horizontal">
                        <div class="field-label">Equipamento</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.type" placeholder="Selecione o tipo do equipamento">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">Descrição</div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.description" placeholder="Opcional">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-footer">
                    <div class="field is-horizontal">
                        <div class="field-label"></div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-primary">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    import Password from '../base/Password.vue';
    import Strength from '../base/Strength.vue';

    export default {
        components: { Password, Strength },

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