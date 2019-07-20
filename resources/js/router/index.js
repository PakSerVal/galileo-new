import Vue from 'vue';
import Router from 'vue-router';
import Home from "../components/Home";
import Courses from "../components/Courses";
import Course from "../components/Course";
import Opinions from "../components/Opinions";
import Photo from "../components/Photo";

Vue.use(Router);

const router = new Router({
	routes: [
		{
			path:      '/',
			name:      'home',
			component: Home,
		},
		{
			path:      '/courses',
			name:      'courses',
			component: Courses,
		},
		{
			path:      '/course/:id',
			name:      'course',
			component: Course,
		},
		{
			path:      '/opinions',
			name:      'opinions',
			component: Opinions,
		},
		{
			path:      '/photo',
			name:      'photo',
			component: Photo,
		},
	]
});

router.beforeResolve((to, from, next) => {
	if (to.name) {
		document.body.classList.add('loading');
	}
	next()
});

router.afterEach((to, from) => {
	document.body.classList.remove('loading');
});

export default router;

