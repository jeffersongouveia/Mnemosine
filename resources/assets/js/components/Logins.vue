<template>
	<ul class="no-padding-parent">
		<li class="item-list" v-for="login in logins.sortBy('name')" 
			@click="selectLogin(login)" :class="{ 'selected': selected == login.id }">
            <div class="line">
                <figure class="image is-32x32">
                    <img :src="login.icon" alt="Ícone do login">
                </figure>

                <div class="item-content">
                    <h4><strong>{{ login.name }}</strong></h4>

                    <small>{{ login.username }}</small>
                </div>
            </div>
		</li>
	</ul>
</template>

<script>
	export default {
		props: {
			items: {
				required: true
			}
		},

		data() {
			return {
				logins: {},
				selected: 0
			}
		},

		methods: {
			selectLogin(login) {
				this.selected = login.id;
				this.$emit('select', login);
			}
		},

		created() {
			this.logins = this.items;
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