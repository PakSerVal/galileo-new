<template>
	<div class="courses">
		<h1 class="courses__title">Наши курсы</h1>
		<div class="courses__wrap">
			<div class="courses__item" v-for="(course, i) in courses" :key="i">
				<v-card v-on:click="() => onCourseSelect(course)">
					<v-img :src="course.image" height="100%">
					</v-img>

					<v-card-title primary-title>
						<div>
							<div class="headline">{{ course.title }}</div>
							<span class="grey--text">{{ course.description }}</span>
						</div>
					</v-card-title>

					<v-card-actions>
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
	import {GET_COURSES} from "../store/actions-enum";
	import EnrollButton from "./EnrollButton";

	export default {
		name: "Courses",
		components: {EnrollButton},
		data() {
			return {
				courses: [],
			};
		},
		mounted() {
			this.$store.dispatch(GET_COURSES)
				.then(() => {
					this.courses = this.$store.getters.courses;
				})
			;
		},
		methods: {
			onCourseSelect: function(id) {
				this.$router.push({name: 'course', params: id})
			},
		},
	}
</script>

<style lang="scss" scoped>
	.courses {
		&__title {
			width: 100%;
			text-align: center;
			margin: 30px 0;
		}

		&__wrap {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		&__item {
			width: 300px;
			margin: 0 20px;
			cursor: pointer;

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
