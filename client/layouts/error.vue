<template>
	<div class="error-page">
		<h1 v-if="error.statusCode === 404">Страница не найдена</h1>
		<h1 v-else>Произошла ошибка</h1>
		<div class="error-page__image">
			<v-img src="/img/error.jpg" lazy-src="/img/error.jpg"></v-img>
		</div>
		<nuxt-link to="/">Вернуться на главную</nuxt-link>
	</div>
</template>

<script>
	export default {
		props: ['error'],
	}
</script>

<style lang="scss">
	.error-page {
		text-align: center;
		margin-top: 30px;

		a {
			font-size: 30px;
		}

		&__image {
			max-height: 640px;
			max-width: 640px;
			margin: auto;
		}
	}
</style>
