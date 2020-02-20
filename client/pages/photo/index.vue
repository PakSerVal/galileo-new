<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
	<v-layout>
		<client-only>
			<gallery :images="photo" :index="imageIndex" @close="imageIndex = null"></gallery>
		</client-only>
		<v-flex xs12 sm10 offset-sm1>
			<v-card>
				<v-container grid-list-sm fluid>
					<v-layout row wrap>
						<v-flex v-for="(image, i) in photo" :key="i" xs4 d-flex>
							<v-card flat tile class="d-flex">
								<v-img
									:src="image"
									:lazy-src="image"
									aspect-ratio="1"
									class="grey lighten-2"
									@click="imageIndex = i"
								>
									<template v-slot:placeholder>
										<v-layout fill-height align-center justify-center ma-0>
											<v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
										</v-layout>
									</template>
								</v-img>
							</v-card>
						</v-flex>
					</v-layout>
				</v-container>
			</v-card>
		</v-flex>
	</v-layout>
</template>

<script>
	import {GET_PHOTO} from "../../common/actions-enum";

	export default {
		name: "Photo",
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
</style>
