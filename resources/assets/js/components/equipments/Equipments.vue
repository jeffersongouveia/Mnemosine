<template>
    <items-list :items="equipments" sort-type="shortname"></items-list>
</template>

<script>
    import Equipments from '../../models/Equipments';

    import ItemsList from '../item/ItemsList.vue';

    export default {
        components: { ItemsList },

        data() {
            return {
                equipments: new Equipments('/api/equipments')
            }
        },

        created() {
            this.equipments.get();
        }
    }
</script>