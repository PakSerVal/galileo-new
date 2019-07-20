<template>
	<div class="selected-course" v-html="course.content"></div>
</template>

<script>
	import {GET_COURSE} from "../store/actions-enum";

	export default {
		name: "Course",
		data() {
			return {
				course: {},
			};
		},
		mounted() {
			this.$store.dispatch(GET_COURSE, this.$route.params.id)
				.then(() => {
					this.course = this.$store.getters.selectedCourse;
				})
			;
		}
	}
</script>

<style scoped>

</style>
