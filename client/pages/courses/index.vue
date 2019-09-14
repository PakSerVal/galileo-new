<template>
	<div class="courses">
		<h1 class="courses__title">Наши курсы</h1>
		<div class="courses__wrap">
			<div class="courses__item" v-for="(course, i) in courses" :key="i">
				<v-card v-on:click="() => onCourseSelect(course)">
					<v-img :src="course.image" height="auto"></v-img>

					<v-card-title primary-title class="courses__item-title">
						<div>
							<div class="headline">{{ course.title }}</div>
							<span class="grey--text">{{ course.description }}</span>
						</div>
					</v-card-title>

					<v-card-actions class="courses__item-buttons">
						<v-btn flat color="purple" v-on:click="() => onCourseSelect(course)">Подробнее</v-btn>
					</v-card-actions>
				</v-card>
			</div>
		</div>
		<div class="courses__enroll-btn">
			<EnrollButton/>
		</div>
	</div>
</template>

<script>
	import EnrollButton from "../../components/EnrollButton";
	import {GET_COURSES} from "../../common/actions-enum";

	export default {
		name: "Courses",
		components: {EnrollButton},
		data() {
			return {
				courses: [],
			};
		},
		mounted() {
			this.$store.dispatch('courses/' + GET_COURSES)
				.then(() => {
					this.courses = this.$store.getters['courses/courses'];
				})
			;
		},
		methods: {
			onCourseSelect: function(course) {
				this.$router.push({path: '/courses/' + course.slug})
			},
		},
	}
</script>

<style lang="scss" scoped>
	.courses {
		&__title {
			width: 100%;
			text-align: center;
			margin: 15px 0;
		}

		&__wrap {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		&__item {
			width: 300px;
			margin: 10px 20px 0;
			cursor: pointer;
			height: auto;

			& > div {
				height: 100%;
			}

			&-title {
				padding-bottom: 52px;
			}

			&-buttons {
				position: absolute;
				top: calc(100% - 52px);
			}

			&:hover {
				-webkit-box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
				-moz-box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
				box-shadow: 0 4px 31px -2px rgba(0,0,0,0.66);
				transition: box-shadow 0.3s ease-in-out;
			}
		}

		&__enroll-btn {
			margin-top: 20px;
		}
	}
</style>
