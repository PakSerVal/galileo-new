<?php

use App\Models\Photo;

/**
	 * Создание отзыва
	 *
	 * @var Photo $photo Фото
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<?= Form::model($photo, ['url' => route('create-photo')]) ?>
		<?= Form::label($photo::ATTR_TITLE, 'Название') ?>
		<?= Form::text($photo::ATTR_TITLE) ?>

		@include('widgets.image-input');

		<?= Form::submit('Создать') ?>
	<?= Form::close() ?>
@endsection
