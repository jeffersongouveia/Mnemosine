<template>
    <items-list :items="favorites"></items-list>
</template>

<script>
    import Favorites from '../models/Favorites';

    import ItemsList from './item/ItemsList.vue';

    export default {
        components: {
            'items-list': ItemsList
        },

        data() {
            return {
                favorites: new Favorites('/api/favorites')
            }
        },

        created() {
            this.favorites.get(true);
        }
    }
</script>