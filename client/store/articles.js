import {GET_ARTICLE, GET_ARTICLES} from "../common/actions-enum";
import {ApiService} from "../common/api-service";
import {SET_ARTICLE, SET_ARTICLES} from "../common/mutations-enum";

const state = () => ({
	articles: [],
	article: {},
});

const getters = {
	articles: state => {
		return state.articles;
	},
	article: state => {
		return state.article;
	},
};

const actions = {
	async [GET_ARTICLES]({commit}) {
		commit(SET_ARTICLES, await ApiService.getArticles());
	},
	async [GET_ARTICLE]({commit}, id) {
		commit(SET_ARTICLE, await ApiService.getArticle(id));
	},
};

const mutations = {
	[SET_ARTICLES](state, {data}) {
		state.articles = data;
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
