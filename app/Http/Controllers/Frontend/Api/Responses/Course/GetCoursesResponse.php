<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Course;

use App\Dto\CourseDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;
use App\Models\Course;

/**
 * Данные курсов в ответе сервера.
 *
 * @author Pak Sergey
 */
class GetCoursesResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param CourseDTO[] $courses
	 *
	 * @author Pak Sergey
	 */
	public function convert($courses): array {
		$result = [];
		foreach ($courses as $course) {
			$result[] = [
				Course::ATTR_ID          => $course->id,
				Course::ATTR_TITLE       => $course->title,
				Course::ATTR_SLUG        => $course->slug,
				Course::ATTR_DESCRIPTION => $course->description,
				'image'                  => $course->imagePath,
			];
		}

		return $result;
	}
}
