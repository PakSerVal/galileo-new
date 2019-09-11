<?php

	use App\Models\Article;

	/**
	 * @var Article $article
	 */
?>
@extends('layouts.ckeditor')

@section('content')
	<?= Form::model($article, ['url' => route('edit-article'), 'class' => 'form-group']) ?>
		<?= Form::hidden($article::ATTR_ID, $article->id) ?>

		<?= Form::label($article::ATTR_TITLE, 'Заголовок') ?>
		<?= Form::text($article::ATTR_TITLE, null, ['class' => 'form-control']) ?>

		<?= Form::label($article::ATTR_CONTENT, 'Контент') ?>
		<?= Form::textarea($article::ATTR_CONTENT, null, ['id' => 'ckeditor', 'class' => 'form-control']) ?>

		<?= Form::label($article::ATTR_PREVIEW_TEXT, 'Текст для превью') ?>
		<?= Form::textarea($article::ATTR_PREVIEW_TEXT, null, ['class' => 'form-control', 'rows' => 3]) ?>

		<?= Form::label($article::ATTR_IS_PUBLISHED, 'Опубликован') ?>
		<?= Form::checkbox($article::ATTR_IS_PUBLISHED) ?>

		<?= Form::label($article::ATTR_PRIORITY, 'Приоритет') ?>
		<?= Form::text($article::ATTR_PRIORITY, null, ['class' => 'form-control']) ?>

		@include('widgets.image-input', ['previewSrc' => $article->thumbImage()->getUrl()])

		<?= Form::submit('Сохранить', ['class' => 'btn btn-primary']) ?>
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
