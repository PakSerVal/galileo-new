import {GET_OPINIONS} from "../common/actions-enum";
import {ApiService} from "../common/api-service";
import {SET_OPINIONS} from "../common/mutations-enum";

const state = () => ({
	opinions: [],
});

const getters = {
	opinions: state => {
		return state.opinions;
	},
};

const actions = {
	async [GET_OPINIONS]({commit}) {
		commit(SET_OPINIONS, await ApiService.getOpinions());
	},
};

const mutations = {
	[SET_OPINIONS](state, {data}) {
		state.opinions = data;
	},
};

export default {
	state,
	getters,
	actions,
	mutations,
};
