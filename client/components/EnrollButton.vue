<template>
	<v-layout row justify-center>
		<v-btn class="blue lighten-2 mt-5 enroll-button" dark large  @click.stop="dialog = true">
			Записаться
		</v-btn>
		<v-dialog
				v-model="dialog"
				width="500"
		>
			<v-card>
				<v-card-title
						class="headline grey lighten-2"
						primary-title
				>
					Запись на курс
				</v-card-title>
				<h1 class="text-xs-center" v-if="isEnrollFormSent">
					Ваша заявка была отправлена!
				</h1>
				<div v-else>
					<v-card-text>
						Позвоните нам по телефону: <span class="dedicated-text">+ 7 (924) 122-61-10</span>
						или оставьте нам свои данные и в ближайшее время мы с Вами свяжемся
					</v-card-text>
					<v-divider></v-divider>
					<v-form v-model="isValid">
						<v-container>
							<v-layout>
								<v-flex xs12>
									<v-text-field v-model="firstName" label="Ваше имя" :rules="nameRules" required></v-text-field>
								</v-flex>

								<v-flex xs12>
									<v-text-field v-model="phone" label="Телефон" :rules="phoneRules" required></v-text-field>
								</v-flex>
							</v-layout>
							<div class="text-xs-center">
								<v-btn :disabled="!isValid" class="enroll-button" color="success" v-on:click="onEnrollBtnClick">
									Отправить
								</v-btn>
							</div>
						</v-container>
					</v-form>
				</div>
			</v-card>
		</v-dialog>
	</v-layout>
</template>

<script>
	import {mapGetters} from "vuex";
	import {SEND_ENROLL_FORM} from "../common/actions-enum";

	export default {
		name: "EnrollButton",
		data() {
			return {
				dialog: false,
				firstName: '',
				phone: '',
				isValid: false,
				nameRules: [
					v => !!v || 'Введите ваше имя',
				],
				phoneRules: [
					v => !!v || 'Введите телефон',
				],
			};
		},
		computed: {
			...mapGetters({
				isEnrollFormSent: 'courses/isEnrollFormSent',
			}),
		},
		methods: {
			onEnrollBtnClick() {
				this.$store.dispatch('courses/' + SEND_ENROLL_FORM, {name: this.firstName, phone: this.phone})
				.then(() => {
					setTimeout(() => {
						this.dialog = false;
					}, 3000)
				})
				;
			},
		},
	}
</script>

<style scoped>
	.enroll-button {
		color:       #fff !important;
		margin-top:  10px !important;
		font-weight: bold;
	}
</style>
