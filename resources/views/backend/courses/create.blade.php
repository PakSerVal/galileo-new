<?php

use App\Http\Controllers\Backend\CourseController;
use App\Models\Course;

	/**
	 * Создание курса
	 *
	 * @var Course   $course           Курс
	 * @var string[] $viewPathVariants Варианты шаблонов
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<?= Form::model($course, ['action' => CourseController::getActionUrl(CourseController::ACTION_CREATE)], ['class' => 'form-group']) ?>
		<?= Form::label($course::ATTR_TITLE, 'Заголовок') ?>
		<?= Form::text($course::ATTR_TITLE, '', ['class' => 'form-control']) ?>
		<br>

		<?= Form::label($course::ATTR_DESCRIPTION, 'Описание') ?>
		<?= Form::textarea($course::ATTR_DESCRIPTION, '', ['class' => 'form-control']) ?>
		<br>

		<?= Form::label($course::ATTR_VIEW_PATH, 'Шаблон') ?>
		<?= Form::select($course::ATTR_VIEW_PATH, $viewPathVariants, null, ['class' => 'form-control']) ?>
		<br>

		<?= Form::label($course::ATTR_SLUG, 'Слаг') ?>
		<?= Form::text($course::ATTR_SLUG, '', ['class' => 'form-control']) ?>
		<br>

		<?= Form::label($course::ATTR_ORDER, 'Порядок') ?>
		<?= Form::text($course::ATTR_ORDER, 0, ['class' => 'form-control']) ?>
		<br>

		@include('widgets.image-input')
		<br>

		<?= Form::submit('Создать', ['class' => 'btn btn-primary']) ?>
	<?= Form::close() ?>
@endsection
