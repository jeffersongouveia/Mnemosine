<template>
    <items-list :items="notes"></items-list>
</template>

<script>
    import Notes from '../models/Notes';

    import ItemsList from './ItemsList.vue';

    export default {
        components: {
            'items-list': ItemsList
        },

        data() {
            return {
                notes: new Notes()
            }
        },

        created() {
            this.notes.get();
        }
    }
</script>