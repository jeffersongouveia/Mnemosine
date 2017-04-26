<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <label class="title">Novo Usuário RADIUS</label>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Usuário</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" v-model="form.username">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Senha</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" v-model="form.value">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Força da senha</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <strength :value="form.strength"></strength>
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

                <section class="content-body"></section>

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
                    username: '',
                    value: '',
                    strength: ''
                })
            }
        },

        methods: {
			loadPassword(generatedPassword) {
                this.form.value = generatedPassword;
            },

            loadStrength(strength) {
                this.form.strength = strength;
            },

            onSubmit() {
			    this.form.post('/api/radius').then(response => this.$router.push('/logins'));
            }
        }
    }
</script>