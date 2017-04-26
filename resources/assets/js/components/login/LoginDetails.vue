<template>
    <div>
        <section class="content-main">
            <item-line v-for="main in loadLogin.main"
                       :label="main.label" :value="main.value" :id-item="main.prop"
                       :enable-copy="main.enableCopy" :is-password="main.isPassword" :is-strength="main.isStrength"
                       :enable-input="enableInput">
            </item-line>

            <field>
                <div class="is-not-widthfully">
                    <password v-show="enableInput" @generated="reloadPassword" @checkedStrength="reloadStrength"></password>
                </div>
            </field>
        </section>

        <section class="content-body">
            <item-line v-for="body in loadLogin.body"
                       :label="body.label" :value="body.value" :id-item="body.prop"
                       :enable-copy="body.enableCopy" :is-password="body.isPassword" :is-strength="body.isStrength"
                       :enable-input="enableInput">
            </item-line>
        </section>
    </div>
</template>

<script>
    import Field from '../base/Field.vue';
    import ItemLine from '../item/ItemLine.vue';
    import Password from '../base/Password.vue';

    export default {
        components: { Field, ItemLine, Password },

        props: {
            login: {
                required: true,
                type: Object
            },

            enableInput: {
                required: false,
                default: false
            }
        },

        computed: {
            loadLogin() {
                return {
                    main: [
                        {
                            label: 'Usuário',
                            value: this.login.username,
                            prop: 'username'
                        },
                        {
                            label: 'Senha',
                            value: this.login.password,
                            prop: 'password',
                            isPassword: true
                        },
                        {
                            label: 'Força da Senha',
                            value: this.login.strength,
                            prop: 'strength',
                            isStrength: true,
                            enableCopy: false
                        }
                    ],

                    body: [
                        {
                            label: 'IP',
                            value: this.login.ip,
                            prop: 'ip'
                        },
                        {
                            label: 'DNS',
                            value: this.login.dns,
                            prop: 'dns'
                        },
                        {
                            label: 'Equipamento',
                            value: this.login.equipment,
                            prop: 'equipment',
                            enableCopy: false
                        }
                    ]
                }
            }
        },

        methods: {
            reloadPassword(passwordGenerated) {
                this.login.password = passwordGenerated;
            },

            reloadStrength(strength) {
                this.login.strength = strength;
            }
        }
    }
</script>