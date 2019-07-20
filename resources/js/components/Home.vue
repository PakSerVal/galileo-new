<template>
	<div class="homepage">
		<section>
			<div class="homepage__main-img-container">
				<img src="/img/galileo/home-background.jpeg"/>
			</div>
		</section>

		<section>
			<v-layout column wrap class="my-5 homepage__info" align-center>
				<v-flex xs12 sm4 class="my-3">
					<div class="text-xs-center">
						<h2 class="headline">Учебный центр Галилео</h2>
						<span class="subheading">
							Лучший способ сдать экзамены!
						</span>
					</div>
					<div class="text-xs-center"><EnrollButton/></div>
				</v-flex>
				<v-flex>
					<v-container grid-list-xl>
						<v-layout row wrap align-center homepage__bonuses>
							<v-flex xs12 md3>
								<v-card class="elevation-0 transparent">
									<v-card-text class="text-xs-center">
										<picture>
											<source srcSet="/img/teacher.png"/>
											<img alt="bonus img"/>
										</picture>
									</v-card-text>
									<v-card-title primary-title class="layout justify-center">
										<div class="headline text-xs-center">Опытные педагоги</div>
									</v-card-title>
									<v-card-text class="text-xs-center">
										В нашем центре работают лучшие специалисты города, которые любят своё дело и дорожат своей репутацией.
										Средний стаж наших учителей составляет <span class="dedicated-text">38 лет</span>
									</v-card-text>
								</v-card>
							</v-flex>
							<v-flex xs12 md3>
								<v-card class="elevation-0 transparent">
									<v-card-text class="text-xs-center">
										<picture>
											<source srcSet="/img/warranty.png"/>
											<img alt="bonus img"/>
										</picture>
									</v-card-text>
									<v-card-title primary-title class="layout justify-center">
										<div class="headline">Гарантия сдачи экзамена</div>
									</v-card-title>
									<v-card-text class="text-xs-center">
										Мы дорожим репутацией, и результаты сдачи экзаменов наших учеников подтверждают эффективность нашей работы.
										Все выпускники, которые обучались в нашем центре успешно сдали экзамены на самые высокие баллы.
									</v-card-text>
								</v-card>
							</v-flex>
							<v-flex xs12 md3>
								<v-card class="elevation-0 transparent">
									<v-card-text class="text-xs-center">
										<picture>
											<source srcSet="/img/schedule.png"/>
											<img alt="bonus img"/>
										</picture>
									</v-card-text>
									<v-card-title primary-title class="layout justify-center">
										<div class="headline text-xs-center">Гибкое расписание</div>
									</v-card-title>
									<v-card-text class="text-xs-center">
										Расписание занятий подбираются для каждого ученика индивидуально
									</v-card-text>
								</v-card>
							</v-flex>
							<v-flex xs12 md3>
								<v-card class="elevation-0 transparent">
									<v-card-text class="text-xs-center">
										<picture>
											<source srcSet="/img/tested.png"/>
											<img alt="bonus img"/>
										</picture>
									</v-card-text>
									<v-card-title primary-title class="layout justify-center">
										<div class="headline text-xs-center">Проверенные методики</div>
									</v-card-title>
									<v-card-text class="text-xs-center">
										Наши методики выстраиваются в соответсвии с лучшими мировыми практиками по подготовке к экзаменам.
										Они основаны на трёх ключевых уровнях: информативом, предметном и психологическом.
										Наши ученики поступают не только в ВУЗы приморья, но и  в ВУЗы Москвы и Санкт- Петербурга.
									</v-card-text>
								</v-card>
							</v-flex>
						</v-layout>
					</v-container>
				</v-flex>
			</v-layout>
		</section>

		<section>
			<div class="homepage__carousel">
				<v-carousel hide-controls height="auto">
					<v-carousel-item v-for="(item,i) in items" :key="i" :src="item.src"></v-carousel-item>
				</v-carousel>
			</div>
		</section>
	</div>
</template>

<script>
	import EnrollButton from "./EnrollButton";

	export default {
		components: {EnrollButton},
		data() {
			return {
				items: [
					{
						src: '/img/galileo/carousel-image-3.jpeg'
					},
					{
						src: '/img/galileo/carousel-image-1.jpeg'
					},
					{
						src: '/img/galileo/carousel-image-2.jpeg'
					},
				],
			};
		},
	}
</script>

<style lang="scss" scoped>
	.homepage {
		&__main-back {
			background-image: url('/img/galileo/home-background.jpeg');
			background-repeat: no-repeat;
			background-position: center;
			min-height: 719px;
			display: flex;
			background-size: cover;
		}

		&__main-img-container {
			max-height: 780px;
			overflow: hidden;
			background: #fff;

			img {
				width: 100%;
			}
		}

		&__info {
			padding-top: 10px;
			background: #fff;
			margin: 0 !important;
		}

		&__bonuses {
			align-items: baseline;
		}

		&__carousel {
			max-height: 853px;
			height: auto;

			.v-carousel {
				max-height: 853px;
			}
		}
	}
</style>
