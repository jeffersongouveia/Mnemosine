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
                    <field label="Usuário">
                        <input type="text" class="input" v-model="form.username" placeholder="Adicione o nome de usuário">
                    </field>

                    <!-- TODO: adicionar na a checagem de força da senha ao digitar -->
                    <field label="Senha">
                        <input type="text" class="input" v-model="form.password" placeholder="Adicione ou utilize o gerador de senhas">
                    </field>

                    <field label="Força da senha">
                        <strength :value="form.strength"></strength>
                    </field>

                    <field>
                        <password @generated="loadPassword" @checkedStrength="loadStrength"></password>
                    </field>
                </section>

                <section class="content-body">
                    <field label="IP">
                        <input type="text" class="input" v-model="form.ip" placeholder="Adicione o IP do dispositivo/software">
                    </field>

                    <field label="DNS">
                        <input type="text" class="input" v-model="form.dns" placeholder="Adicione o nome de domínio">
                    </field>

                    <field label="Equipamento">
                        <input type="text" class="input" v-model="form.equipment" placeholder="Adicione o tipo de equipamento">
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
    import Strength from '../base/Strength.vue';

    export default {
        components: { Field, Password, Strength },

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