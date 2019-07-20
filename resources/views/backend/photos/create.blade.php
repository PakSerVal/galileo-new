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
	<?= Form::model($photo, ['url' => route('create-photo'), 'class' => 'form-group']) ?>
		<?= Form::label($photo::ATTR_TITLE, 'Название') ?>
		<?= Form::text($photo::ATTR_TITLE, '', ['class' => 'form-control']) ?>

		@include('widgets.image-input');

		<?= Form::submit('Создать', ['class' => 'btn btn-submit']) ?>
	<?= Form::close() ?>
@endsection
