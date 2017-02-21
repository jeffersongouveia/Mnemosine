<template>
    <items-list :items="logins"></items-list>
</template>

<script>
    import Logins from '../models/Logins';

    import ItemsList from './ItemsList.vue';

    export default {
        components: {
            'items-list': ItemsList
        },

        data() {
            return {
                logins: new Logins()
            }
        },

        created() {
            this.logins.favorites();
        }
    }
</script>