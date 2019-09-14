<?php

use App\Models\Article;

/**
 * @var Article $article  Статья
 */
?>

@extends('layouts.ckeditor')

@section('content')
	<?= Form::model($article, ['url' => route('create-article', [], false), 'class' => 'form-group']) ?>
		<?= Form::label($article::ATTR_TITLE, 'Заголовок') ?>
		<?= Form::text($article::ATTR_TITLE, '', ['class' => 'form-control']) ?>
		<br>

		<?= Form::label($article::ATTR_CONTENT, 'Контент') ?>
		<?= Form::textarea($article::ATTR_CONTENT, '', ['id' => 'ckeditor', 'class' => 'form-control']) ?>
		<br>

		<?= Form::label($article::ATTR_PREVIEW_TEXT, 'Текст для превью') ?>
		<?= Form::textarea($article::ATTR_PREVIEW_TEXT, '', ['class' => 'form-control', 'rows' => 3]) ?>
		<br>

		<?= Form::label($article::ATTR_IS_PUBLISHED, 'Опубликован') ?>
		<?= Form::checkbox($article::ATTR_IS_PUBLISHED) ?>
		<br>

		<?= Form::label($article::ATTR_PRIORITY, 'Приоритет') ?>
		<?= Form::text($article::ATTR_PRIORITY, 0, ['class' => 'form-control']) ?>
		<br>

		@include('widgets.image-input')
		<br>

		<?= Form::submit('Опубликовать', ['class' => 'btn btn-primary']) ?>
	<?= Form::close() ?>
	<script>
		ClassicEditor
		.create( document.querySelector( '#ckeditor' ), {
			ckfinder: {
				uploadUrl: '/t-admin/images/ckeditor-upload'
			},
			alignment: {
				options: [ 'left', 'right', 'center', 'justify' ]
			},
			mediaEmbed: {
				previewsInData: true,
			},
			image: {
				toolbar: [
					'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
					'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'
				],

				styles: [
					'full',
					'alignLeft',
					'alignRight'
				]
			},
		})
		.then( editor => {
			console.log( editor );
		} )
		.catch( error => {
			console.error( error );
		})
		;
	</script>
@endsection
