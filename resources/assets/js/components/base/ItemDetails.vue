<template>
	<div class="item-details" v-if="item.id">
		<section class="header">
            <figure class="image is-32x32">
                <img :src="item.icon" alt="Ícone do item">
            </figure>
			
			<span class="title">{{ item.name }}</span>
		</section>

		<section class="content">
			<login-details v-if="item.username" :login="item"></login-details>
            <note-details v-else :note="item"></note-details>

			<section class="content-footer">
                <div class="container">
                    <div class="line">
                        <label class="label">Última alteração</label>

                        <span class="info">{{ item.updated_at }}</span>
                    </div>
                </div>

                <div class="container">
                    <div class="line">
                        <label class="label">Criado em</label>

                        <span class="info">{{ item.created_at }}</span>
                    </div>
                </div>
			</section>
		</section>
	</div>
</template>

<script>
    import LoginDetails from '../LoginDetails.vue';
    import NoteDetails from '../NoteDetails.vue';

	export default {
		components: {
            'login-details': LoginDetails,
            'note-details': NoteDetails
		},

		props: {
			item: {
                type: Object,
				required: true
			}
		}
	}
</script>

<style lang="css">
	.item-details {
		position: relative;
		width: 100%;
		margin-top: 1.5em;
        padding-left: 25%;
	}

	.item-details .header {
		margin-bottom: 5em;
		display: inline-block;
	}

	.item-details .content {
		position: relative;
		width: 100%;
	}

	.item-details .content .line {
		display: inline-block;
	}

    .item-details .header,
    .item-details .content {
        padding-right: 1em;
    }

	.item-details .header .image,
	.item-details .label {
        float: left;
        margin-right: 1em;
	}

	.item-details .header .title,
	.item-details .info {
        float: right;
	}

	.item-details .content-main,
	.item-details .content-body {
		display: block;
		margin-bottom: 2em;
	}

	.item-details .content-footer {
		display: block;
	}
</style>