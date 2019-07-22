<?php

	use App\Models\Photo;

/**
	 * Редактирование фото
	 *
	 * @var Photo $photo фото
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	{{ Form::model($photo, ['url' => route('update-photo'), 'class' => 'form-group']) }}
	{{ Form::hidden($photo::ATTR_ID, $photo->id) }}

	{{ Form::label($photo::ATTR_TITLE, 'Заголовок') }}
	{{ Form::text($photo::ATTR_TITLE, null, ['class' => 'form-control']) }}

	@include('widgets.image-input', ['previewSrc' => $photo->image->getUrl()]);

	{{ Form::submit('Сохранить', ['class' => 'btn btn-submit']) }}
	{{ Form::close() }}
@endsection
