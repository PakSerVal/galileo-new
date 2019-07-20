<?php

use App\Models\Opinion;

/**
	 * Создание отзыва
	 *
	 * @var Opinion $opinion Отзыв
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<?= Form::model($opinion, ['url' => route('create-opinion')]) ?>
		<?= Form::label($opinion::ATTR_TEXT, 'Текст') ?>
		<?= Form::textarea($opinion::ATTR_TEXT) ?>

		<?= Form::label($opinion::ATTR_APPEAL, 'Имя автора') ?>
		<?= Form::text($opinion::ATTR_APPEAL) ?>

		<?= Form::label($opinion::ATTR_IS_PUBLISHED, 'Опубликован') ?>
		<?= Form::checkbox($opinion::ATTR_IS_PUBLISHED) ?>

		<?= Form::submit('Создать') ?>
	<?= Form::close() ?>
@endsection
