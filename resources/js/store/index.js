import Vue from 'vue';
import Vuex from 'vuex';

import courses  from './courses.module';
import opinions from './opinions.module';
import photo from './photo.module';

Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		courses,
		opinions,
		photo,
	},
});
