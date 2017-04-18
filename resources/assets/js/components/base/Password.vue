<template>
    <div class="container">
        <div class="line">
            <div class="info">
                <div class="half-width">
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
                                        </p>

                                        <p class="control">
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

                                    <!-- TODO: alinhar a linha do range e do label -->
                                    <div class="field is-horizontal">
                                        <p class="control">
                                            <input type="range" min="4" max="30" v-model="length">
                                            <label v-text="length"></label>
                                        </p>
                                    </div>
                                </div>

                                <button type="button" @click="generate"
                                        class="button is-success" :class="{ 'is-disabled': isAllOptionsDisabled }">
                                    Gerar senha
                                </button>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PasswordGenerator from '../../utilities/PasswordGenerator';

    export default {
        data() {
            return {
                passwordGenerator: new PasswordGenerator(),

                length: 15,
                uppercase: true,
                lowercase: true,
                numbers: true,
                symbols: true,

                password: "",
                strength: 0
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
                this.$emit('generated', this.password);

                this.checkPassword();
                this.$emit('checkedStrength', this.strength);
            },

            checkPassword() {
                this.strength = this.passwordGenerator.strength(this.password);
            }
        }
    }
</script>