<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Frontend\Api\Responses\ApiResponseConverter;
use App\Http\Controllers\Frontend\Api\Responses\Course\GetCourseResponse;
use App\Http\Controllers\Frontend\Api\Responses\Course\GetCoursesResponse;
use App\Repositories\CourseRepository;
use Illuminate\Http\JsonResponse;

/**
 * Контроллер курсов.
 *
 * @author Pak Sergey
 */
class CourseController extends ApiController {
	const ACTION_GET_COURSES = 'getCourses';
	const ACTION_GET_COURSE  = 'getCourse';

	/** @var CourseRepository Репозиторий курсов */
	private $courses;

	/** @var ApiResponseConverter Преобразователь ответа сервера */
	private $converter;

	/**
	 * @param CourseRepository     $courses
	 * @param ApiResponseConverter $responseConverter
	 *
	 * @author Pak Sergey
	 */
	public function __construct(CourseRepository $courses, ApiResponseConverter $responseConverter) {
		$this->courses   = $courses;
		$this->converter = $responseConverter;
	}

	/**
	 * Получение курсов.
	 *
	 * @return JsonResponse
	 *
	 * @author Pak Sergey
	 */
	public function getCourses() {
		$courses  = $this->courses->getAll();
		$response = $this->converter->convert($courses, GetCoursesResponse::class);

		return $this->respond($response);
	}

	/**
	 * Получение курса.
	 *
	 * @param string $slug
	 *
	 * @return JsonResponse
	 *
	 * @author Pak Sergey
	 */
	public function getCourse(string $slug) {
		$response = $this->converter->convert($this->courses->getBySlug($slug), GetCourseResponse::class);

		return $this->respond($response);
	}
}
