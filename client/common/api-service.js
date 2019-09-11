import axios from 'axios';
import {Url} from "./url-enums";

export const ApiService = {
	getCourses() {
		return axios.get(Url.getCourses);
	},

	getCourse(id) {
		return axios.get(Url.getCourse + id);
	},

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

	getArticles() {
		return axios.get(Url.getArticles);
	},

	getArticle(id) {
		return axios.get(Url.getArticle + id);
	}
};
