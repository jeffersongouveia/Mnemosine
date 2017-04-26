<!-- TODO: calcular a força da senha -->
<template>
    <div>
        <section class="content-main">
            <item-line v-for="main in loadEquipment.main"
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
            <item-line v-for="body in loadEquipment.body"
                       :label="body.label" :value="body.value" :id-item="body.prop"
                       :enable-copy="body.enableCopy" :enable-input="enableInput">
            </item-line>
        </section>
    </div>
</template>

<script>
    import PasswordGenerator from '../../utilities/PasswordGenerator';

    import Field from '../base/Field.vue';
    import ItemLine from '../item/ItemLine.vue';
    import Password from '../base/Password.vue';

    export default {
        components: { Field, ItemLine, Password },

        props: {
            equipment: {
                required: true,
                type: Object
            },

            enableInput: {
                required: false,
                default: false
            }
        },

        data() {
            return {
                passwordGenerator: new PasswordGenerator(),
                strength: 0
            }
        },

        computed: {
            loadEquipment() {
                return {
                    main: [
                        {
                            label: 'IP',
                            value: this.equipment.nasname,
                            prop: 'nasname'
                        },
                        {
                            label: 'Porta',
                            value: this.equipment.ports,
                            prop: 'ports'
                        },
                        {
                            label: 'Senha',
                            value: this.equipment.secret,
                            prop: 'secret',
                            isPassword: true
                        },
                        {
                            label: 'Força da Senha',
                            value: this.strength,
                            prop: 'strength',
                            isStrength: true,
                            enableCopy: false
                        }
                    ],

                    body: [
                        {
                            label: 'Equipamento',
                            value: this.equipment.type,
                            prop: 'type',
                            enableCopy: false
                        },
                        {
                            label: 'Descrição',
                            value: this.equipment.description,
                            prop: 'description'
                        }
                    ]
                }
            }
        },

        methods: {
            reloadPassword(passwordGenerated) {
                this.equipment.secret = passwordGenerated;
            },

            reloadStrength(strength) {
                this.strength = strength;
            }
        },

        created() {
            this.strength = this.passwordGenerator.strength(this.equipment.secret);
        }
    }
</script>