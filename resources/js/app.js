import Vue from 'vue';
import App from './App';
import store from './store';
import router from './router';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify);

new Vue({
	router,
	store,
	render: h => h(App)
}).$mount("#app");
