import axios from 'axios';
import {Url} from "./url-enums";

export const ApiService = {
	/**
	 * Получение курсов.
	 *
	 * @return AxiosPromise<T>
	 */
	getCourses() {
		return axios.get(Url.getCourses);
	},

	/**
	 * Получение курса.
	 *
	 * @param {number} id
	 *
	 * @return AxiosPromise<T>
	 */
	getCourse(id) {
		return axios.get(Url.getCourse + id);
	},

	/**
	 * Получение отзывов.
	 *
	 * @return AxiosPromise<T>
	 */
	getOpinions() {
		return axios.get(Url.getOpinions);
	},

	/**
	 * Получение фото.
	 *
	 * @return AxiosPromise<T>
	 */
	getPhoto() {
		return axios.get(Url.getPhoto);
	},

	/**
	 * Отправка формы записи на курс.
	 *
	 * @param {string} name
	 * @param {string} phone
	 *
	 * @return AxiosPromise<T>
	 */
	sendEnrollForm(name, phone) {
		return axios.post(Url.sendEnrollForm, {name, phone});
	},

	/**
	 * Аутентификация.
	 *
	 * @param email
	 * @param password
	 *
	 * @return AxiosPromise<T>
	 */
	login(email, password) {
		return axios.post(Url.login, {email, password});
	},
};
