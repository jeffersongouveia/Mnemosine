<template>
    <span class="show-options" @mouseleave="copied = false">
        <span v-if="!passwordOption" v-text="value"></span>
        <input v-else :type="typeInput" :value="value" class="is-disabled">

        <span class="options">
            <button class="button is-small" :class="{ 'is-success': copied }"
                    @click="copied = true" :data-clipboard-text="value">
                <span class="icon is-small">
                    <i class="fa" :class="[copied ? 'fa-check' : 'fa-clipboard']"></i>
                </span>
            </button>

            <button class="button is-small" v-if="passwordOption" @click="togglePassword">
                <span class="icon is-small">
                    <i class="fa" :class="[hidePassword ? 'fa-eye' : 'fa-eye-slash']"></i>
                </span>
            </button>
        </span>
    </span>
</template>

<script>
    import Clipboard from '../clipboard.min';

    export default {
        props: {
            value: {
                required: true
            },

            passwordOption: {
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
    .options {
        margin-left: .5em;
        float: right;
    }

    .options .button {
        -webkit-transition: opacity 0.3s ease-in-out;
        -moz-transition: opacity 0.3s ease-in-out;
        -o-transition: opacity 0.3s ease-in-out;
        -ms-transition: opacity 0.3s ease-in-out;
        transition: opacity 0.3s ease-in-out;
        opacity: 0;
    }

    .show-options:hover .button {
        opacity: 1;
    }
</style>