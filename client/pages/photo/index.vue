<template>
	<div class="photo">
		<gallery :images="photo" :index="imageIndex" @close="imageIndex = null"></gallery>
		<div class="image" v-for="(image, i) in photo" :key="i">
			<img :src="image" alt="photo" @click="imageIndex = i">
		</div>
	</div>
</template>

<script>
	import VueGallery from 'vue-gallery';
	import {GET_PHOTO} from "../../common/actions-enum";

	export default {
		name: "Photo",
		components: {
			gallery: VueGallery,
		},
		data() {
			return {
				photo: [],
				imageIndex: null,
			};
		},
		mounted() {
			this.$store.dispatch('photo/' + GET_PHOTO)
				.then(() => {
					this.photo = this.$store.getters['photo/photo'];
				})
			;
		},
	}
</script>

<style lang="scss" scoped>
	.photo {
		display: flex;
		flex-wrap: wrap;
		padding: 20px;
	}

	.image {
		width: 33%;

		img {
			width: 100%;
		}
	}
</style>
