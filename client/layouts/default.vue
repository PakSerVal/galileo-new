<template>
	<v-app light>
		<Header/>
		<v-content><nuxt/><section>
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
		</section><v-footer class="blue darken-2">
			<v-layout row wrap align-center>
				<v-flex xs12>
					<div class="white--text ml-3">
						© «Галилео» 2016-2020. г.Артём ул.Лазо 11
					</div>
				</v-flex>
			</v-layout>
		</v-footer>
		</v-content>
	</v-app>
</template>

<script>
	import Header from "../components/Header";

	export default {
		name: "App",
		components: {Header}
	}
</script>

<style lang="scss">
	body {
		font-family: 'Cormorant Garamond', serif !important;
		color: #808080;
		font-size: 16px;

		.headline {
			font-family: 'Cormorant Garamond', serif !important;
			font-weight: bold;
		}
	}

	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
	}

	a {
		color: #808080 !important;
		text-decoration: none;
		transition-duration: .3s;
		transition-property: color;

		&:hover, &:focus {
			color: #dba4a4 !important;;
			text-decoration: none;
		}
	}

	.application {
		font-family: 'Cormorant Garamond', serif !important;
		color: #808080 !important;
	}
</style>


