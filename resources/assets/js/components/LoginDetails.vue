<template>
    <div>
        <section class="content-main">
            <item-line v-for="main in loadLogin.main"
                       :label="main.label" :value="main.value"
                       :enable-copy="main.enableCopy" :is-password="main.isPassword" :is-strength="main.isStrength">
            </item-line>
        </section>

        <section class="content-body">
            <item-line v-for="body in loadLogin.body"
                       :label="body.label" :value="body.value"
                       :enable-copy="body.enableCopy" :is-password="body.isPassword" :is-strength="body.isStrength">
            </item-line>
        </section>
    </div>
</template>

<script>
    import ItemLine from './ItemLine.vue';

    export default {
        components: {
            'item-line': ItemLine
        },

        props: {
            login: {
                required: true,
                type: Object
            }
        },

        computed: {
            loadLogin() {
                return {
                    main: [
                        {
                            label: 'Usuário',
                            value: this.login.username
                        },
                        {
                            label: 'Senha',
                            value: this.login.password,
                            isPassword: true
                        },
                        {
                            label: 'Força da Senha',
                            value: this.login.strength,
                            isStrength: true,
                            enableCopy: false
                        }
                    ],

                    body: [
                        {
                            label: 'IP',
                            value: this.login.ip
                        },
                        {
                            label: 'DNS',
                            value: this.login.dns
                        },
                        {
                            label: 'Equipamento',
                            value: this.login.equipment,
                            enableCopy: false
                        }
                    ]
                }
            }
        }
    }
</script>