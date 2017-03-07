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
                                    <label class="label">Nota</label>
                                </div>

                                <div class="control">
                                    <textarea class="textarea" v-model="form.note">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-body"></section>

                <section class="content-footer">
                    <button type="submit" class="button is-primary">Salvar</button>
                </section>
            </section>
        </form>
    </div>
</template>

<script>
    export default {
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