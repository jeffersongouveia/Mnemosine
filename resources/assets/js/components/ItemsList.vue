<template>
    <columns>
        <div slot="options">
            <div class="control has-icon">
                <input type="text" class="input" placeholder="Pesquisar">
                <span class="icon is-small">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <dropdown-sort></dropdown-sort>

            <ul class="no-padding-parent">
                <li class="item-list" v-for="item in items.sortBy('name')" @click="selectItem(item)"
                    :class="{ 'selected': selected == item.id }">
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

        <div>
            <item-details :item="itemSelected"></item-details>
        </div>
    </columns>
</template>

<script>
    import Logins from '../models/Logins';

    import Columns from './base/Columns.vue';
    import Sort from './Sort.vue';
    import ItemDetails from './base/ItemDetails.vue';

	export default {
        components: {
            'columns': Columns,
            'dropdown-sort': Sort,
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
                itemSelected: {}
			}
		},

		methods: {
			selectItem(item) {
				this.selected = item.id;
                this.itemSelected = item;
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