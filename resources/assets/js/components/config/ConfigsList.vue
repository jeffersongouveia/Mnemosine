<template>
    <columns>
        <div slot="options">
            <ul class="no-padding-parent">
                <li class="item-list" v-for="config in configs" @click="selectItem(config)"
                    :class="{ 'selected': selected == config.id }" :id="'li-item-' + config.id">
                    <div class="line">
                        <figure class="image is-32x32">
                            <img :src="config.icon" alt="Ícone do Login">
                        </figure>

                        <div class="item-content">
                            <h3><strong>{{ config.name }}</strong></h3>

                            <small>&emsp;</small>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div>
            <div class="item-details">
                <vaults></vaults>
            </div>
        </div>
    </columns>
</template>

<script>
    import Columns from '../base/Columns.vue';

    import Vaults from './Vaults.vue';

    export default {
        components: {
            'columns': Columns,
            'vaults': Vaults
        },

        data() {
            return {
                configs: [
                    {
                        id: 1,
                        name: 'Cofres',
                        icon: '/img/icons/vault.png'
                    },
                    {
                        id: 2,
                        name: 'Sincronização',
                        icon: '/img/icons/cloud.png'
                    },
                    {
                        id: 3,
                        name: 'Usuários',
                        icon: '/img/icons/user.png'
                    },
                    {
                        id: 4,
                        name: 'Grupos',
                        icon: '/img/icons/group.png'
                    },
                    {
                        id: 5,
                        name: 'Geral',
                        icon: '/img/icons/gears.png'
                    }
                ],

                selected: 0
            }
        },

        methods: {
            selectItem(item) {
                this.selected = item.id;
            }
        }
    }
</script>