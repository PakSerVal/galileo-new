<template>
	<v-layout justify-center>
		<v-flex xs12 sm10>
				<v-container fluid grid-list-md>
					<v-layout row wrap>
						<v-flex v-for="article in articles" :key="article.title" sm4 xs12>
							<v-card class="article" v-on:click="() => onArticleSelect(article.id)">
								<v-img :src="article.image" height="200px">
									<v-container fill-height fluid pa-2>
										<v-layout fill-height>
											<v-flex xs12 align-end flexbox>
												<span class="headline white--text" v-text="article.title"></span>
											</v-flex>
										</v-layout>
									</v-container>
								</v-img>
								<v-card-title primary-title>
									<span class="article__text">{{ article.preview_text }}</span>
								</v-card-title>

								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn flat color="purple" v-on:click="() => onArticleSelect(article.id)">Подробнее</v-btn>
								</v-card-actions>
							</v-card>
						</v-flex>
					</v-layout>
				</v-container>
		</v-flex>
	</v-layout>
</template>

<script>
	import {GET_LATEST_ARTICLES} from "../../common/actions-enum";

	export default {
		name: "Articles",
		data() {
			return {
				articles: [],
			};
		},
		mounted() {
			this.$store.dispatch('articles/' + GET_LATEST_ARTICLES)
				.then(() => {
					this.articles = this.$store.getters['articles/latestArticles'];
				})
			;
		},
		methods: {
			onArticleSelect: function(id) {
				this.$router.push({path: '/articles/' + id})
			},
		},
	}
</script>

<style lang="scss" scoped>
	.article {
		cursor: pointer;

		&>div {
			height: 100%;
		}

		&__text {
			height: 72px;
			overflow: hidden;
		}

		&:hover {
			-webkit-box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
			-moz-box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
			box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
			transition: box-shadow 0.3s ease-in-out;
		}
	}
</style>
