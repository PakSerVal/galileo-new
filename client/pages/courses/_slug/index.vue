<template>
	<div>
		<div class="selected-course" v-html="course.content"></div>
		<EnrollButton/>
	</div>
</template>

<script>
	import EnrollButton from "../../../components/EnrollButton";
	import {GET_COURSE} from "../../../common/actions-enum";

	export default {
		name: "Course",
		components: {EnrollButton},
		data() {
			return {
				course: {},
			};
		},
		mounted() {
			this.$store.dispatch('courses/' + GET_COURSE, this.$route.params.id)
			.then(() => {
				this.course = this.$store.getters['courses/selectedCourse'];
			})
			;
		}
	}
</script>

<style lang="scss">
	@import '~assets/scss/mixins';

	.dedicated-text {
		font-weight: bold;
		color: red;
	}

	.course {
		&__bonuses {
			margin-top: -45px;
			text-align: center;

			@include respond-to(phone) {
				margin-top: 20px;
			}
		}

		&__bonuses-item {
			display:        inline-block;
			margin:         0 20px 20px;
			width:          200px;
			vertical-align: top;

			@include respond-to(phone) {
				font-size: 11px;
				width:     100px;
			}
		}

		&__bonuses-item-image {
			text-align: center;

			img {
				border:        2px solid black;
				border-radius: 40px;
			}
		}

		&__bonuses-item-title {
			font-weight: bold;
		}

		&__bonuses-line {
			margin: 20px 140px;

			@include respond-to(phone) {
				margin: 20px;
			}
		}

		&__description {
			max-width: 900px;
			padding: 20px;
			margin: auto;
			font-size: 22px;
		}


		&__program-title {
			text-align: center;
			font-size: 25px;
			margin-bottom: 15px;
		}

		&__program {
			display: flex;
			min-height: 600px;
			color: white;
			background: linear-gradient(to right, #239b2c, #d26060);
			font-weight: bold;

			h1 {
				text-align: center;
				font-size: 25px;
				margin-bottom: 40px;
			}

			@include respond-to(phone) {
				flex-wrap: wrap;
			}
		}

		&__program-arrow {
			display: inline-block;
			width: 20%;
			padding-top: 200px;

			@include respond-to(phone) {
				display: none;
			}

			img {
				width: 100%;
			}
		}

		&__plan {
			margin-top: 20px;
		}

		&__plan-item {
			padding: 20px;
			background-color: white;
			color: black;
			border-radius: 8px;
			font-weight: bold;
			margin: 10px 0;
		}

		&__summary-info {
			padding: 50px;
			text-align: center;

			@include respond-to(phone) {
				padding: 10px;
			}

			> div {
				display: inline-block;
				vertical-align: top;
				width: 300px;
				margin: 10px 15px;
			}
		}
	}

	.ege {
		.course {
			&__objects {
				margin-bottom: 50px;
				text-align: center;

				&-title {
					margin-bottom: 10px;
				}
			}

			&__object {
				display: inline-block;
				width: 200px;
				height: 50px;
				border-radius: 8px;
				margin: 10px;
				padding: 10px 0 0 0;

				&_type_math {
					background-image: linear-gradient(58deg, #fb2f77, #f46212 29%, #f4b67b);
				}

				&_type_physic {
					background-image: linear-gradient(90deg, #1f41f8, #3dc0a7 50%, #fff000);
				}

				&_type_russian {
					background-image: linear-gradient(90deg, #c94d6d, #5d69ca);
				}

				&_type_chemistry {
					background-image: linear-gradient(270deg, #ffe814, #e51686);
				}

				&_type_biology {
					background-image: linear-gradient(270deg, #46cccd, #6957ca);
				}

				&_type_social-study {
					background-image: linear-gradient(270deg, #287cb6, #e17207);
				}

				&_type_history {
					background-image: linear-gradient(270deg, #b628a5, #a3d39c);
				}

				&_type_informatic {
					background-image: linear-gradient(270deg, #333b05, #f45858);
				}
			}

			&__object-image {
				display: inline-block;
				margin-right: 10px;
			}

			&__object-title {
				display: inline-block;
				color: white;
				font-size: 20px;
				font-weight: bold;
				vertical-align: top;
				padding-top: 2px;
			}

			&__info {
				margin-bottom: 20px;
				margin-top: 20px;
			}

			&__info-purpose {
				text-align: center;
				background-color: #aef6ff;
				background-image: linear-gradient(90deg,#aef6ff,#c9d0ff);
				min-height: 300px;
				font-size: 19px;
				padding: 60px;
				margin-top: 50px;

				@include respond-to(phone) {
					margin-top: 10px;
					padding: 5px;
					font-size: 15px;
				}

				h1 {
					color: #e59122;

					@include respond-to(phone) {
						font-size: 25px;
					}
				}
			}

			&__info-items {
				text-align: center;
			}

			&__info-items-title {
				font: 40px Windsorc;
			}

			&__info-item {
				display: inline-block;
			}


			&__stage {
				display: inline-block;
				vertical-align: top;
				padding: 30px;
				width: 40%;

				@include respond-to(phone) {
					width: 100%;
				}
			}

			&__stage-title {
				padding: 20px 0;

				span {
					font-size: 30px;
					font-weight: bold;
					display: inline-block;
					vertical-align: top;
					padding-top: 10px;
				}
			}
		}
	}
</style>
