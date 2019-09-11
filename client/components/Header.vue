<template>
	<v-toolbar class="white header" height="-1">
		<div class="header__content">
			<v-toolbar-title class="logo">
				<a href="/" class="logo_image"><img src="/img/logo.png" alt="logo"></a>
			</v-toolbar-title>
			<v-toolbar-items class="menu">
				<v-btn flat v-on:click="() => {this.$router.push({name: 'courses'})}">Наши курсы</v-btn>
				<v-btn flat v-on:click="() => {this.$router.push({name: 'opinions'})}">Отзывы</v-btn>
				<v-btn flat v-on:click="() => {this.$router.push({name: 'photo'})}">Фото</v-btn>
<!--				<v-btn flat v-on:click="() => {this.$router.push({name: 'articles'})}">Статьи</v-btn>-->
			</v-toolbar-items>
		</div>
	</v-toolbar>
</template>

<script>
	export default {
		name: "Header",
	}
</script>

<style lang="scss" scoped>
	.header {
		&__content {
			flex-wrap: wrap;
			display: flex;
			width: 100%;
		}
	}

	.logo {
		width: 210px;
		max-height: 60px;
		overflow: initial;

		@media (max-width: 767px) {
			padding-bottom: 10px;
		}

		img {
			height: 100%;
		}
	}

	.menu {
		margin-left: 20px;

		@media (max-width: 767px) {
			padding-bottom: 10px;
		}

		button {
			height: 100% !important;
		}
	}
</style>
