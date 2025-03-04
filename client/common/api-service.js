import axios from 'axios';
import {Url} from "./url-enums";

export const ApiService = {
	getOpinions() {
		return axios.get(Url.getOpinions);
	},

	getPhoto() {
		return axios.get(Url.getPhoto);
	},

	sendEnrollForm(name, phone) {
		return axios.post(Url.sendEnrollForm, {name, phone});
	},

	sendOpinion(name, content) {
		return axios.post(Url.sendOpinion, {name, content});
	},

	getLatestArticles() {
		return axios.get(Url.getLatestArticles);
	},

	getTopArticles() {
		return axios.get(Url.getTopArticles);
	},

	getArticle(id) {
		return axios.get(Url.getArticle + id);
	}
};
