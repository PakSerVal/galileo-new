<?php

	use App\Http\Controllers\Backend\CourseController;
	use App\Models\Course;

/**
	 * Редактирование курса
	 *
	 * @var Course   $course           Курс
	 * @var string[] $viewPathVariants Варианты шаблонов
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<?= Form::model($course, ['action' => CourseController::getActionUrl(CourseController::ACTION_UPDATE)]) ?>
	<?= Form::hidden($course::ATTR_ID, $course->id) ?>

	<?= Form::label($course::ATTR_TITLE, 'Заголовок') ?>
	<?= Form::text($course::ATTR_TITLE) ?>

	<?= Form::label($course::ATTR_DESCRIPTION, 'Описание') ?>
	<?= Form::textarea($course::ATTR_DESCRIPTION) ?>

	<?= Form::label($course::ATTR_VIEW_PATH, 'Шаблон') ?>
	<?= Form::select($course::ATTR_VIEW_PATH, $viewPathVariants) ?>

	@include('widgets.image-input');

	<?= Form::submit('Создать') ?>
	<?= Form::close() ?>
@endsection
