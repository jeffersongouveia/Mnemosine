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
                    <field label="IP">
                        <input type="text" class="input" v-model="form.nasname" placeholder="Adicione o IP de acesso ao dispositivo">
                    </field>

                    <field label="Porta">
                        <input type="text" class="input" v-model="form.ports" placeholder="Porta de acesso do RADIUS">
                    </field>

                    <password @generated="loadData"></password>
                </section>

                <section class="content-body">
                    <field label="Equipamento">
                        <input type="text" class="input" v-model="form.type" placeholder="Selecione o tipo do equipamento">
                    </field>

                    <field label="Descrição">
                        <input type="text" class="input" v-model="form.description" placeholder="Opcional">
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
    import Password from '../base/Password.vue';

    export default {
        components: { Field, Password },

        data() {
            return {
                form: new Form({
                    nasname: '',
                    shortname: '',
                    type: 'Mikrotik',
                    ports: 1812,
                    secret: '',
                    description: '',
                })
            }
        },

        methods: {
            loadData(password, strength) {
                this.form.secret = password;
            },

            onSubmit() {
                this.form.post('/api/equipments').then(response => this.$router.push('/equipments'));
            }
        }
    }
</script>