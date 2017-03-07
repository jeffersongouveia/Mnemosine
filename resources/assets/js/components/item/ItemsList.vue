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
                                <img :src="item.icon" alt="Ícone do Login">
                            </figure>

                            <div class="item-content">
                                <h4><strong>{{ item.name }}</strong></h4>

                                <small v-if="item.username">{{ item.username }}</small>
                                <small v-else>{{ item.note | resume }}</small>
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
			}
		},

		data() {
			return {
				selected: 0,
                itemSelected: {},
                sortType: 'name'
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

<style lang="css">
	.no-padding-parent {
		margin-left: -0.75em;
		margin-right: -0.75em;
	}

    .is-fullheight {
        height: 100%;
    }

    .scrollable {
        overflow-y: scroll;
        height: 100%;
    }

	.item-list {
		margin-bottom: .1em;
		padding-left: 0.75em;
		padding-right: 0.75em;
        display: block;
	}

    .item-list .line {
        display: inline-block;
        position: relative;
    }

    .item-list .line figure {
        position: absolute;
        margin-right: 1em;
        bottom: 0.3em;
    }

    .item-list .line .item-content {
        float: right;
        margin-left: 3em;
    }

	.item-list:hover {
		background-color: whitesmoke;
  	    color: #00d1b2;
	}

	.selected {
		background-color: whitesmoke;
	}
</style>