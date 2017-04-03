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
                let score = 0;
                if (!this.password)
                    return score;

                // award every unique letter until 5 repetitions
                let letters = {};
                for (let i=0; i<this.password.length; i++) {
                    letters[this.password[i]] = (letters[this.password[i]] || 0) + 1;
                    score += 5.0 / letters[this.password[i]];
                }

                // bonus points for mixing it up
                let variations = {
                    digits: /\d/.test(this.password),
                    lower: /[a-z]/.test(this.password),
                    upper: /[A-Z]/.test(this.password),
                    nonWords: /\W/.test(this.password),
                };

                let variationCount = 0;
                for (let check in variations) {
                    variationCount += (variations[check] == true) ? 1 : 0;
                }
                score += (variationCount - 1) * 10;

                this.strength = parseInt(score);
            }
        }
    }
</script>