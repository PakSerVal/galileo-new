import {SEND_ENROLL_FORM} from "../common/actions-enum";
import {ApiService} from "../common/api-service";
import {SET_ENROLL_FORM_SENT} from "../common/mutations-enum";

const state = () => ({
	courses: [],
	selectedCourse: {},
	isEnrollFormSent: false,
});

const getters = {
	courses: state => {
		return state.courses;
	},
	selectedCourse: state => {
		return state.selectedCourse;
	},
	isEnrollFormSent: state => {
		return state.isEnrollFormSent;
	},
};

const actions = {
	async [SEND_ENROLL_FORM]({commit}, data) {
		await ApiService.sendEnrollForm(data.name, data.phone);

		commit(SET_ENROLL_FORM_SENT, true);
	},
};

const mutations = {
	[SET_ENROLL_FORM_SENT](state, value) {
		state.isEnrollFormSent = value;
	},
};

export default {
	state,
	getters,
	actions,
	mutations,
};

