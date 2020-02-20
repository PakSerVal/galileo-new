import {GET_PHOTO} from "../common/actions-enum";
import {ApiService} from "../common/api-service";
import {SET_PHOTO} from "../common/mutations-enum";

const state = () => ({
	photo: [],
});

const getters = {
	photo: state => {
		return state.photo;
	},
};

const actions = {
	async [GET_PHOTO]({commit}) {
		commit(SET_PHOTO, await ApiService.getPhoto());
	},
};

const mutations = {
	[SET_PHOTO](state, {data}) {
		state.photo = data;
	},
};

export default {
	state,
	getters,
	actions,
	mutations,
};
