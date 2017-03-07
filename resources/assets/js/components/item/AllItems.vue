<template>
    <items-list :items="items"></items-list>
</template>

<script>
    import Items from '../../models/Items';

    import ItemsList from './ItemsList.vue';

    export default {
        components: {
            'items-list': ItemsList
        },

        data() {
            return {
                items: new Items('/api/all')
            }
        },

        created() {
            this.items.get(true);
        }
    }
</script>