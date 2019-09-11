<template>
	<v-container grid-list-md>
		<h1 class="article-title">{{ article.title }}</h1>
		<v-layout row>
			<v-flex xs12 class="ck-content" v-html="article.content"></v-flex>
		</v-layout>
	</v-container>
</template>

<script>
	import {GET_ARTICLE} from "../../common/actions-enum";

	export default {
		name: "Article",
		data() {
			return {
				article: {},
			};
		},
		mounted() {
			this.$store.dispatch('articles/' + GET_ARTICLE, this.$route.params.id)
				.then(() => {
					this.article = this.$store.getters['articles/article'];
				})
			;
		}
	}
</script>

<style lang="scss" scoped>
	.ck-content {
		color: black;
	}

	.article-title {
		color: black;
		text-align: center;
		margin-bottom: 20px;
	}
</style>
