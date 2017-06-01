<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <label class="title">Novo Usuário RADIUS</label>
                </div>
            </section>

            <section class="content">
                <section class="content-body">
                    <field label="Usuário">
                        <input type="text" class="input" v-model="form.username" placeholder="Nome do usuário" autofocus>
                    </field>

                    <password @generated="loadData"></password>
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
    import Field from '../base/Field.vue';
    import Password from '../base/Password.vue';

    export default {
    	components: { Field, Password },

        data() {
            return {
                form: new Form({
                    username: '',
                    value: ''
                })
            }
        },

        methods: {
    	    hasErrors() {
    	        return this.form.username === '' || this.form.value === '';
            },

    	    loadData(password, strength) {
    	        this.form.value = password;
            },

            onSubmit() {
			    this.form.post('/api/radius').then(response => this.$router.push('/logins'));
            }
        }
    }
</script>