<template>
	<div class="login-details" v-if="login['id']">
		<section class="header">
            <figure class="image is-32x32">
                <img :src="login.icon" alt="Ícone do login">
            </figure>
			
			<span class="title">{{ login.name }}</span>
		</section>

		<section class="content">
			<section class="content-main">
				<div class="container">
					<div class="line">
						<label class="label">Usuário</label>

                        <options class="info" :value="login.username"></options>
					</div>
				</div>

				<div class="container">
					<div class="line">
						<label class="label">Senha</label>

                        <options class="info" :value="login.password" password-option="true"></options>
					</div>
				</div>

				<div class="container">
					<div class="line">
						<label class="label">Força da senha</label>

						<progress id="strength-pass" :value="login.strength" max="100"
								  class="info progress is-small"
								  :class="[login.strength < 30 ? 'is-danger' : login.strength > 80 ? 'is-success' : 'is-warning']">
						</progress>
					</div>
				</div>
			</section>

			<section class="content-body">
				<div class="container">
					<div class="line">
						<label class="label">IP</label>

                        <options class="info" :value="login.ip"></options>
					</div>
				</div>

				<div class="container">
					<div class="line">
						<label class="label">DNS</label>

                        <options class="info" :value="login.dns"></options>
					</div>
				</div>

				<div class="container">
					<div class="line">
						<label class="label">Equipamento</label>

						<span class="info">{{ login.equipment }}</span>
					</div>
				</div>
			</section>

			<section class="content-footer">
				<div class="container">
					<div class="line">
						<label class="label">Última alteração</label>

						<span class="info">{{ login.updated_at }}</span>
					</div>
				</div>

				<div class="container">
					<div class="line">
						<label class="label">Criado em</label>

						<span class="info">{{ login.created_at }}</span>
					</div>
				</div>
			</section>
		</section>
	</div>
</template>

<script>
	import LoginOptions from './LoginOptions.vue';

	export default {
		components: {
			'options': LoginOptions
		},

		props: {
			login: {
				required: true
			}
		},

        data() {
            return {
                copied: false,
                hide: true
            }
        },

        methods: {
            copy(value) {
                this.copied = true;
            },

            showPassword() {
                this.hide = !this.hide;
            }
        }
	}
</script>

<style lang="css">
	#strength-pass {
		width: 10em;
	}

	.login-details {
		position: relative;
		width: 100%;
		margin-top: 1.5em;
	}

	.login-details .header {
		margin-bottom: 5em;
		display: inline-block;
	}

	.login-details .content {
		position: relative;
		width: 100%;
	}

	.login-details .content .line {
		display: inline-block;
		margin-bottom: 1.5em;
	}

	.login-details .header .image,
	.login-details .label {
		position: absolute;
		float: left;
		right: 60%;
	}

	.login-details .header .title,
	.login-details .info {
		position: absolute;
		float: right;
		left: 45%;
	}

	.login-details .content-main,
	.login-details .content-body {
		display: block;
		margin-bottom: 2em;
	}

	.login-details .content-footer {
		display: block;
	}
</style>