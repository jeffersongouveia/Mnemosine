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
                    <field label="Usuário">
                      <input type="text" class="input" v-model="form.username" placeholder="Escolha seu username">
                    </field>

                    <field label="Senha atual">
                        <input type="password" class="input" v-model="form.actual_password" placeholder="A senha atual deste usuário">

                        <p v-if="showHelp('actual_password')" class="help is-danger">
                            {{ response.errors.actual_password }}
                        </p>
                    </field>

                    <field label="Nova senha">
                        <input type="password" class="input" v-model="form.new_password" placeholder="A nova senha para este usuário">

                        <p v-if="showHelp('new_password')" class="help is-danger">
                            {{ response.errors.new_password[0] }}
                        </p>
                    </field>

                    <field label="Confirme sua nova senha">
                        <input type="password" class="input" v-model="form.new_password_confirmation" placeholder="Confirme a nova senha">
                    </field>
                </form>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-danger" @click="hideModal" autofocus>Cancelar</button>
                <button type="submit" class="button is-success" @click.prevent="onSubmit">Salvar</button>
            </footer>
        </div>
    </div>
</template>

<script>
    import Password from '../base/Password.vue';
    import Strength from '../base/Strength.vue';
    import Field from '../base/Field.vue';

    export default {
        components: { Password, Strength, Field },

        props: {
            show: {
                required: true,
                default: false
            },

            user: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                form: new Form({
                    id: 0,
                    username: '',
                    actual_password: '',
                    new_password: '',
                    new_password_confirmation: ''
                }),

                strength: 0,

                response: []
            }
        },

        created() {
            this.form = this.user;
        },

        methods: {
            onSubmit() {
                let form = new Form({
                    id: this.form.id,
                    username: this.form.username,
                    actual_password: this.form.actual_password,
                    new_password: this.form.new_password,
                    new_password_confirmation: this.form.new_password_confirmation,
                });

                form.put('/api/users/' + form.id).then(response => {
                    if(response.success) {
                        this.hideModal();
                        this.cleanForm();
                        this.$emit('updated', form);
                    } else {
                        this.response = response;
                    }
                });
            },

            cleanForm() {
                for(let fields in this.form) {
                    this.form[fields] = typeof this.form[fields] === 'string' ? '' : 0;
                }

                this.response = [];
            },

            hideModal() {
                this.$emit('hideModal');
                this.cleanForm();
            },

            showHelp(field) {
                let hasErrors = typeof this.response.success !== 'undefined' && !this.response.success;
                let hasTheField = hasErrors && (Object.keys(this.response.errors).indexOf(field) > -1);

                return hasErrors && hasTheField;
            }
        }
    }
</script>
