<template>
	<main>
		<v-app light>
			<Header/>
			<v-content>
				<router-view/>
				<section>
					<v-container grid-list-xl>
						<v-layout row wrap justify-center class="my-5">
							<v-flex xs12 sm4>
								<v-card class="elevation-0 transparent">
									<v-card-title primary-title class="layout justify-center">
										<div class="headline">О нас</div>
									</v-card-title>
									<v-card-text>
										&nbsp;&nbsp;&nbsp;&nbsp;Учебно-консультационный центр «Галилео» - это частное учреждение дополнительного образования детей дошкольного и школьного возраста.
										В учреждении работают высококвалифицированные педагоги со стажем работы свыше 25 лет. Мы умеем работать и любим свое дело!
									</v-card-text>
								</v-card>
							</v-flex>
							<v-flex xs12 sm4 offset-sm1 class="text-xs-center">
								<v-card class="elevation-0 transparent">
									<v-card-title primary-title class="layout justify-center">
										<div class="headline">Контакты</div>
									</v-card-title>
									<v-card-text>
										Всегда на связи с вами!
									</v-card-text>
									<v-list class="transparent">
										<v-list-tile>
											<v-list-tile-action>
												<v-icon class="blue--text text--lighten-2">phone</v-icon>
											</v-list-tile-action>
											<v-list-tile-content>
												<v-list-tile-title>+7 (924) 122-61-10</v-list-tile-title>
											</v-list-tile-content>
										</v-list-tile>
										<v-list-tile>
											<v-list-tile-action>
												<v-icon class="blue--text text--lighten-2">place</v-icon>
											</v-list-tile-action>
											<v-list-tile-content>
												<v-list-tile-title>г.Артём ул.Лазо,11</v-list-tile-title>
											</v-list-tile-content>
										</v-list-tile>
										<v-list-tile>
											<v-list-tile-action>
												<v-icon class="blue--text text--lighten-2">email</v-icon>
											</v-list-tile-action>
											<v-list-tile-content>
												<v-list-tile-title>pak-mun@yandex.ru</v-list-tile-title>
											</v-list-tile-content>
										</v-list-tile>
									</v-list>
								</v-card>
							</v-flex>
						</v-layout>
					</v-container>
				</section>
				<v-footer class="blue darken-2">
					<v-layout row wrap align-center>
						<v-flex xs12>
							<div class="white--text ml-3">
								© «Галилео» 2016-2019. г.Артём ул.Лазо 11
							</div>
						</v-flex>
					</v-layout>
				</v-footer>
			</v-content>
		</v-app>
		<div class="loader">
			<img class="loader__img" src="/img/galileo/loader.svg" alt="loader">
		</div>
	</main>
</template>

<script>
	import Header from "./components/Header";

	export default {
		name: "App",
		components: {Header}
	}
</script>

<style lang="scss">
	.loading {
		background-color: #f6f6f6;

		.loader {
			opacity: 1;
			display: block;
		}
	}

	.loader {
		background: rgba(255,255,255,0.5);
		opacity: 0;
		height: 100%;
		left: 0;
		position: fixed;
		display: none;
		top: 0;
		width: 100%;
		z-index: 100000;
		-webkit-transition: opacity 1s ease-in-out;
		-moz-transition: opacity 1s ease-in-out;
		-ms-transition: opacity 1s ease-in-out;
		-o-transition: opacity 1s ease-in-out;
		transition: opacity 1s ease-in-out;

		&__img {
			position: absolute;
			top: calc(50% - (135px / 2));
			left: calc(50% - (135px / 2));
		}
	}
</style>
