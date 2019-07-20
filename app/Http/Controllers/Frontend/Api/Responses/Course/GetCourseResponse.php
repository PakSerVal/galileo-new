<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Course;

use App\Dto\CourseDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;
use App\Models\Course;

/**
 * Данные курса в ответе сервера.
 *
 * @author Pak Sergey
 */
class GetCourseResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param CourseDTO $course
	 *
	 * @author Pak Sergey
	 */
	public function convert($course): array {
		$result = [
			Course::ATTR_TITLE       => $course->title,
			Course::ATTR_DESCRIPTION => $course->description,
			'content'                => view($course->viewPath)->render(),
		];

		return $result;
	}
}
