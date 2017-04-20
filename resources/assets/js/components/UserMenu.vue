<template>
    <dropdown :options="menu_options">
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
                    { label: 'Logout', route: '/logout' }
                ]
            }
        }
    }
</script>