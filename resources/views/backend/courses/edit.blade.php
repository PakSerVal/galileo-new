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
	<?= Form::model($course, ['action' => CourseController::getActionUrl(CourseController::ACTION_UPDATE), 'class' => 'form-group']) ?>
	<?= Form::hidden($course::ATTR_ID, $course->id) ?>
	<br>

	<?= Form::label($course::ATTR_TITLE, 'Заголовок') ?>
	<?= Form::text($course::ATTR_TITLE, null, ['class' => 'form-control']) ?>
	<br>

	<?= Form::label($course::ATTR_DESCRIPTION, 'Описание') ?>
	<?= Form::textarea($course::ATTR_DESCRIPTION, null, ['class' => 'form-control']) ?>
	<br>

	<?= Form::label($course::ATTR_VIEW_PATH, 'Шаблон') ?>
	<?= Form::select($course::ATTR_VIEW_PATH, $viewPathVariants, null, ['class' => 'form-control']) ?>
	<br>

	<?= Form::label($course::ATTR_SLUG, 'Слаг') ?>
	<?= Form::text($course::ATTR_SLUG, null, ['class' => 'form-control']) ?>
	<br>

	<?= Form::label($course::ATTR_ORDER, 'Порядок') ?>
	<?= Form::text($course::ATTR_ORDER, null, ['class' => 'form-control']) ?>
	<br>

	@include('widgets.image-input', ['previewSrc' => $course->image->getUrl()]);
	<br>

	<?= Form::submit('Сохранить', ['class' => 'btn btn-primary']) ?>
	<?= Form::close() ?>
@endsection
