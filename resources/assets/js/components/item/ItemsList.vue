<template>
    <columns>
        <div slot="options" class="is-fullheight">
            <div class="control has-icon">
                <input type="text" class="input" placeholder="Pesquisar">
                <span class="icon is-small">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <sort :quantity="quantity" @selected="changeSortType"></sort>

            <div class="scrollable">
                <ul class="no-padding-parent">
                    <li class="item-list" v-for="item in loadItens" @click="selectItem(item)"
                        :class="{ 'selected': selected == item.id }" :id="'li-item-' + item.id">
                        <div class="line">
                            <figure class="image is-32x32">
                                <img v-if="isEquipment(item)" src="/img/icons/mikrotik.png" alt="Ícone do Login">
                                <img v-else :src="item.icon" alt="Ícone do Login">
                            </figure>

                            <div class="item-content">
                                <h4>
                                    <strong v-if="!isEquipment(item)">{{ item.name }}</strong>
                                    <strong v-else>{{ item.shortname }}</strong>
                                </h4>

                                <small v-if="isLogin(item)">{{ item.username }}</small>
                                <small v-else-if="isNote(item)">{{ item.note | resume }}</small>
                                <small v-else-if="isEquipment(item)">{{ item.nasname }}</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div>
            <item-details :item="itemSelected" @toogleFavorite="updateFavorite" @moveToTrash="removeItem"></item-details>
        </div>
    </columns>
</template>

<script>
    import Columns from '../base/Columns.vue';
    import Sort from '../Sort.vue';
    import ItemDetails from './ItemDetails.vue';

	export default {
        components: {
            'columns': Columns,
            'sort': Sort,
            'item-details': ItemDetails
        },

		props: {
			items: {
				required: true
			},

            sortType: {
			    required: false,
                default: 'name'
            }
		},

		data() {
			return {
				selected: 0,
                itemSelected: {}
			}
		},

        computed: {
            loadItens() {
                return this.items.sortBy(this.sortType);
            },

            quantity() {
                return this.items.count();
            }
        },

		methods: {
            isLogin(item) {
                return typeof item['username'] !== 'undefined';
            },

            isNote(item) {
                return typeof item['note'] !== 'undefined';
            },

            isEquipment(item) {
                return typeof item['shortname'] !== 'undefined';
            },

			selectItem(item) {
				this.selected = item.id;
                this.itemSelected = item;
			},

            changeSortType(sort) {
                this.sortType = sort.prop;
            },

            updateFavorite(item) {
                if(this.$route.path == '/favorites') {
                    this.removeItem(item);
                }
            },

            removeItem(item) {
                //limpa as variaveis que controlam o item selecionado
                this.selected = 0;
                this.itemSelected = {};

                //remove o elemento do HTML
                document.getElementById('li-item-' + item.id).outerHTML = '';

                //remove o item do array de objetos
                this.items.remove(item);
            }
		},

        filters: {
            resume(text) {
                return text.slice(0, 30);
            }
        },

		beforeUpdate() {
			app.$on('selected', function(sort) {
//				this.logins = this.items.sortBy(sort);
			});
		}
	}
</script>