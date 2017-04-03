<template>
    <span class="show-options" @mouseleave="copied = false">
        <div class="value">
            <input v-if="!isPassword && !isStrength" type="text" :value="value" class="input is-disabled">
            <input v-else-if="isPassword" :type="typeInput" :value="value" class="input is-disabled">
            <strength v-else id="strength" :value="value"></strength>
        </div>

        <span class="options" v-show="enableCopy">
            <button class="button is-small" :class="{ 'is-success': copied }"
                    @click="copied = true" :data-clipboard-text="value">
                <span class="icon is-small">
                    <i class="fa" :class="[copied ? 'fa-check' : 'fa-clipboard']"></i>
                </span>
            </button>

            <button class="button is-small" v-if="isPassword" @click="togglePassword">
                <span class="icon is-small">
                    <i class="fa" :class="[hidePassword ? 'fa-eye' : 'fa-eye-slash']"></i>
                </span>
            </button>
        </span>
    </span>
</template>

<script>
    import Clipboard from '../../clipboard.min';
    import Strength from '../base/Strength.vue';

    export default {
        components: { Strength },

        props: {
            value: {
                required: true
            },
            enableCopy: {
                required: false,
                default: true
            },
            isPassword: {
                required: false,
                default: false
            },
            isStrength: {
                required: false,
                default: false
            }
        },

        data() {
            return {
                copied: false,
                hidePassword: true,
                typeInput: 'password'
            }
        },

        methods: {
            togglePassword() {
                this.hidePassword = !this.hidePassword;

                this.typeInput == 'text' ? this.typeInput = 'password' : this.typeInput = 'text';
            }
        },

        created() {
            return new Clipboard('.options .button');
        }
    }
</script>

<style lang="css">
    #strength {
        width: 10em;
    }

    .value {
        display: inline-block;
    }
</style>