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
                <vaults v-show="canIShow(1)"></vaults>
                <radius v-show="canIShow(3)"></radius>
                <users v-show="canIShow(4)"></users>
            </div>
        </div>
    </columns>
</template>

<script>
    import Columns from '../base/Columns.vue';

    import Vaults from './Vaults.vue';
    import Radius from './Radius.vue';
    import Users from './Users.vue';

    export default {
        components: { Columns, Vaults, Radius, Users },

        data() {
            return {
                base: '/img/icons/',

                configs: [
                    {
                        id: 1,
                        name: 'Cofres',
                        icon: this.getImgPath('vault')
                    },
                    {
                        id: 2,
                        name: 'Sincronização',
                        icon: this.getImgPath('cloud')
                    },
                    {
                        id: 3,
                        name: 'RADIUS',
                        icon: this.getImgPath('freeradius')
                    },
                    {
                        id: 4,
                        name: 'Usuários',
                        icon: this.getImgPath('user')
                    },
                    {
                        id: 5,
                        name: 'Grupos',
                        icon: this.getImgPath('group')
                    },
                    {
                        id: 6,
                        name: 'Geral',
                        icon: this.getImgPath('gears')
                    }
                ],

                selected: 0
            }
        },

        methods: {
            getImgPath(name) {
                return '/img/icons/' + name + '.png';
            },

            selectItem(item) {
                this.selected = item.id;
            },

            canIShow(id) {
                return this.selected == id;
            }
        }
    }
</script>