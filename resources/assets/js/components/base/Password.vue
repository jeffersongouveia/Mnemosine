<template>
    <div>
        <field label="Senha">
            <input type="text" class="input" v-model="password" @input="checkStrength" placeholder="Escolha sua senha com sabedoria">
        </field>

        <field v-show="!hiddenStrength">
            <progress :value="strength" max="150"
                      class="info progress is-small"
                      :class="[strength < 50 ? 'is-danger' : strength > 70 ? 'is-success' : 'is-warning']">
            </progress>
        </field>

        <field v-show="!hiddenPassword">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <div class="field">
                                <p class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" v-model="uppercase">
                                        A-Z
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" v-model="lowercase">
                                        a-z
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" v-model="numbers">
                                        0-9
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" v-model="symbols">
                                        !$%@#
                                    </label>
                                </p>
                            </div>

                            <div class="field is-horizontal">
                                <p class="control">
                                    <input type="range" min="4" max="30" v-model="length">
                                    <label v-text="length"></label>
                                </p>
                            </div>
                        </div>

                        <button type="button" @click="generate" class="button is-success" :class="{ 'is-disabled': isAllOptionsDisabled }">
                            Gerar senha
                        </button>
                    </div>
                </article>
            </div>
        </field>
    </div>
</template>

<script>
    import Field from './Field.vue';
    import PasswordGenerator from '../../utilities/PasswordGenerator';

    export default {
        components: { Field },

        props: {
            password: {
                required: false,
                type: String,
                default: ""
            },

            hiddenStrength: {
                required: false,
                type: Boolean,
                default: false
            },

            hiddenPassword: {
                required: false,
                type: Boolean,
                default: false
            }
        },

        data() {
            return {
                passwordGenerator: new PasswordGenerator(),
//                password: '',
                strength: 0,

                length: 15,
                uppercase: true,
                lowercase: true,
                numbers: true,
                symbols: true,

                passwordInitialized: false
            }
        },

        computed: {
            isAllOptionsDisabled() {
                return !this.uppercase && !this.lowercase && !this.numbers && !this.symbols;
            }
        },

        methods: {
            generate() {
                let options = [
                    this.uppercase,
                    this.lowercase,
                    this.numbers,
                    this.symbols
                ];

                this.password = this.passwordGenerator.generate(this.length, options);
                this.checkStrength();
            },

            checkStrength() {
                this.strength = this.passwordGenerator.strength(this.password);
                this.$emit('generated', this.password, this.strength);
            }
        }
    }
</script>