<template>
    <dropdown :options="menu_options" is-dropup="true">
        <slot></slot>
    </dropdown>
</template>

<script>
    import Dropdown from './Dropdown.vue';

    export default {
        components: {
            'dropdown': Dropdown
        },

        data() {
            return {
                menu_options: [
                    'Login',
                    'Nota Segura',
                    '',
                    'Usuário',
                    'Grupo',
                    '',
                    'Configurações'
                ]
            }
        }
    }
</script>