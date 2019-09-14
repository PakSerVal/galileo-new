import {GET_ARTICLE, GET_LATEST_ARTICLES, GET_TOP_ARTICLES} from "../common/actions-enum";
import {ApiService} from "../common/api-service";
import {SET_ARTICLE, SET_LATEST_ARTICLES, SET_TOP_ARTICLES} from "../common/mutations-enum";

const state = () => ({
	latestArticles: [],
	topArticles: [],
	article: {},
});

const getters = {
	latestArticles: state => {
		return state.latestArticles;
	},
	topArticles: state => {
		return state.topArticles;
	},
	article: state => {
		return state.article;
	},
};

const actions = {
	async [GET_LATEST_ARTICLES]({commit}) {
		commit(SET_LATEST_ARTICLES, await ApiService.getLatestArticles());
	},
	async [GET_TOP_ARTICLES]({commit}) {
		commit(SET_TOP_ARTICLES, await ApiService.getTopArticles());
	},
	async [GET_ARTICLE]({commit}, id) {
		commit(SET_ARTICLE, await ApiService.getArticle(id));
	},
};

const mutations = {
	[SET_LATEST_ARTICLES](state, {data}) {
		state.latestArticles = data;
	},
	[SET_TOP_ARTICLES](state, {data}) {
		state.topArticles = data;
	},
	[SET_ARTICLE](state, {data}) {
		state.article = data;
	},
};

export default {
	state,
	getters,
	actions,
	mutations,
};
