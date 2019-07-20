<?php

use App\Http\Controllers\Backend\CourseController;?>

@extends('layouts.backend')

@section('content')
	<a href="{{ route('courses-list') }}" class="list-group-item list-group-item-action">Курсы</a>
	<a href="{{ route('opinions-list') }}" class="list-group-item list-group-item-action">Отзывы</a>
	<a href="{{ route('photos-list') }}" class="list-group-item list-group-item-action">Фото</a>
@endsection

