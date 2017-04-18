<template>
    <div class="modal" :class="[ show ? 'is-active' : '' ]">
        <div class="modal-background" @click="hideModal"></div>

        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Edição de usuário</p>
                <button class="delete" @click="hideModal"></button>
            </header>

            <section class="modal-card-body">
                <form method="post">
                    <div class="container">
                        <div class="line">
                            <label class="label">Usuário</label>

                            <div class="info">
                                <input type="text" class="input" v-model="form.username">
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <label class="label">Senha</label>

                            <div class="info">
                                <input type="text" class="input" v-model="form.value">
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="line">
                            <label class="label">Força da Senha</label>

                            <div class="info">
                                <strength :value="strength"></strength>
                            </div>
                        </div>
                    </div>

                    <password @generated="loadPassword" @checkedStrength="loadStrength"></password>
                </form>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-danger" @click="hideModal" autofocus>Cancelar</button>
                <button class="button is-success" @click.prevent="onSubmit">Salvar</button>
            </footer>
        </div>
    </div>
</template>

<script>
    import Password from '../base/Password.vue';
    import Strength from '../base/Strength.vue';

    export default {
        components: { Password, Strength },

        props: {
            show: {
                required: true,
                default: false
            },

            radius: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                form: new Form({
                    id: 0,
                    username: '',
                    value: ''
                }),

                strength: 0
            }
        },

        created() {
            this.form = this.radius;
        },

        methods: {
            onSubmit() {
                let form = new Form({
                    id: this.form.id,
                    username: this.form.username,
                    value: this.form.value
                });

                form.put('/api/radius/' + form.id).then(() => {
                    this.hideModal();
                    this.$emit('updated', this.form);
                });
            },

            loadPassword(password) {
                this.form.value = password;
            },

            loadStrength(strength) {
                this.strength = strength;
            },

            hideModal() {
                this.$emit('hideModal');
            }
        }
    }
</script>