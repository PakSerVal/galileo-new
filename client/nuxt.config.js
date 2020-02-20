module.exports = {
	/*
	** Headers of the page
	*/
	head:    {
		title: 'Учебный центр Галилео город Артём',
		meta:  [
			{charset: 'utf-8'},
			{name: 'viewport', content: 'width=device-width, initial-scale=1'},
			{hid: 'description', name: 'description', content: 'Подготовка к ЕГЭ (11 кл.) и ОГЭ (9 кл.) по всем предметам школьной программы (математика, физика, русский язык, литература, история, обществознание)'},
			{name: 'keywords', content: 'Учебный центр Галилео город Артём, ЕГЭ и ОГЭ в Артёме, Английский язык, Корейский язык'}
		],
		link:  [
			{rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
			{rel: 'stylesheet', type: 'text/css', href: 'https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap'},
			{rel: 'stylesheet', type: 'text/css', href: 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'},
		],
	},
	/*
	** Customize the progress bar color
	*/
	loading: {color: '#3B8070'},
	/*
	** Build configuration
	*/
	build: {
		/*
		** Run ESLint on save
		*/
		extend(config, {isDev, isClient}) {
			if (isDev && isClient) {
				config.module.rules.push({
					enforce: 'pre',
					test:    /\.(js|vue)$/,
					loader:  'eslint-loader',
					exclude: /(node_modules)/
				})
			}
		},
	},
	plugins: [
		'@plugins/vuetify',
		{ src: '@plugins/vue-gallery.js', ssr: false }
	],
	modules: [
		[
			'@nuxtjs/yandex-metrika',
			{
				id: '49510570',
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
			}
		],
	],
	css: [
		'assets/css/main.css'
	]
};
