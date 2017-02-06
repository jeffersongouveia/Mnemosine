<template>
	<ul class="no-padding-parent">
		<li class="item-list" v-for="login in logins">
			<h4><strong>{{ login.name }}</strong></h4>
			<small>{{ login.username }}</small>
		</li>
	</ul>
</template>

<script>
	export default {
		props: {
			logins: {
				required: true,
				type: Array
			}
		}
	}
</script>

<style lang="css">
	.no-padding-parent {
		margin-left: -0.75em;
		margin-right: -0.75em;
	}

	.item-list {
		margin-bottom: .7em;
		padding-left: 0.75em;
		padding-right: 0.75em;
	}

	.item-list:hover {
		background-color: whitesmoke;
    	color: #00d1b2;
	}
</style>