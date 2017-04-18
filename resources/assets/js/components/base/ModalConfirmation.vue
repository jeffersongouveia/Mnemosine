<template>
    <div class="modal" :class="[ show ? 'is-active' : '' ]">
        <div class="modal-background" @click="hideModal"></div>

        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Cuidado!</p>
                <button class="delete" @click="hideModal"></button>
            </header>

            <section class="modal-card-body">
                <slot></slot>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-success" @click="hideModal" autofocus>Cancelar</button>
                <button class="button is-danger" @click="confirm">Tenho certeza</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            show: {
                required: true,
                default: false
            }
        },

        methods: {
            hideModal() {
                this.$emit('hideModal');
            },

            confirm() {
                this.$emit('confirm');
            }
        }
    }
</script>

<style lang="css">
    .alert-text {
        color: red;
    }
</style>