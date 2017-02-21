<template>
    <dropdown :options="menu_options" is-dropup="true">
        <slot></slot>
    </dropdown>
</template>

<script>
    import Dropdown from './base/Dropdown.vue';

    export default {
        components: {
            'dropdown': Dropdown
        },

        data() {
            return {
                menu_options: [
                    { label: 'Login', route: '/login/create' },
                    { label: 'Nota Segura', route: '/note/create' },
                    { label: '', route: '', isLine: true },
                    { label: 'Usuário', route: '/user/create' },
                    { label: 'Grupo', route: '/group/create' },
                    { label: '', route: '', isLine: true },
                    { label: 'Configurações', route: '/configurations' }
                ]
            }
        }
    }
</script>