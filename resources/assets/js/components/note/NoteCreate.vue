<template>
    <div class="item-details">
        <form method="post" @submit.prevent="onSubmit">
            <section class="header">
                <div class="control is-horizontal">
                    <figure class="image is-32x32">
                        <img :src="form.icon" alt="Ícone do item">
                    </figure>

                    <input type="text" class="input" v-model="form.name" placeholder="Título da nota" autofocus>
                </div>
            </section>

            <section class="content">
                <section class="content-main">
                    <field label="Nota">
                        <textarea class="textarea" v-model="form.note" placeholder="Deixe aqui sua anotação :)"></textarea>
                    </field>
                </section>

                <section class="content-footer">
                    <field>
                        <button type="submit" class="button is-primary">Salvar</button>
                    </field>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    import Field from '../base/Field.vue';

    export default {
        components: { Field },

        data() {
            return {
                form: new Form({
                    id_vault: this.getIdVault,

                    icon: '/img/icons/text-lines.png',
                    name: '',

                    note: '',

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

                this.form.post('/api/notes').then(response => this.$router.push('/notes'));
            }
        }
    }
</script>