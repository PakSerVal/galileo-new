<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Подготовка к ЕГЭ (11 кл.) и ОГЭ (9 кл.) по всем предметам школьной программы (математика, физика, русский язык, литература, история, обществознание)">
	<meta name="keywords" content="Галилео, учебный центр, ЕГЭ город Артем">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Учебный центр Галилео город Артём</title>

	<!-- Scripts -->
	<script src="{{ mix('js/vendor.js') }}" defer></script>
	<script src="{{ mix('js/manifest.js') }}" defer></script>
	<script src="{{ mix('js/app.js') }}" defer></script>

	<?php if (App::environment('production')): ?>
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
			(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
				m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
			(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

			ym(49510570, "init", {
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true
			});
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/49510570" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
	<?php endif; ?>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app"></div>
</body>
</html>
