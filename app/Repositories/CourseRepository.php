<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Dto\CourseDTO;
use App\Models\Course;

/**
 * Репозиторий курсорв.
 *
 * @author Pak Sergey
 */
class CourseRepository {

	/**
	 * Получение всех курсов.
	 *
	 * @return CourseDTO[]
	 *
	 * @author Pak Sergey
	 */
	public function getAll(): array {
		$result    = [];
		$dbCourses = Course::orderBy(Course::ATTR_ORDER)->get(); /** @var Course[] $dbCourses */

		foreach ($dbCourses as $dbCourse) {
			$course              = new CourseDTO();
			$course->id          = $dbCourse->id;
			$course->title       = $dbCourse->title;
			$course->slug        = $dbCourse->slug;
			$course->description = $dbCourse->description;
			$course->viewPath    = $dbCourse->view_path;
			$course->imagePath   = $dbCourse->image->getUrl();
			$course->createdAt   = $dbCourse->created_at;
			$course->updatedAt   = $dbCourse->updated_at;

			$result[] = $course;
		}

		return $result;
	}

	/**
	 * Получение курса по идентификатору.
	 *
	 * @param int $id
	 *
	 * @return CourseDTO
	 *
	 * @author Pak Sergey
	 */
	public function getOne(int $id): ?CourseDTO {
		$dbCourse = Course::find($id);

		$course              = new CourseDTO();
		$course->id          = $dbCourse->id;
		$course->title       = $dbCourse->title;
		$course->slug        = $dbCourse->slug;
		$course->description = $dbCourse->description;
		$course->viewPath    = $dbCourse->view_path;
		$course->imagePath   = $dbCourse->image->getUrl();
		$course->createdAt   = $dbCourse->created_at;
		$course->updatedAt   = $dbCourse->updated_at;

		return $course;
	}

	/**
	 * @param string $slug
	 *
	 * @return CourseDTO
	 */
	public function getBySlug(string $slug): ?CourseDTO {
		$dbCourse = Course::where(Course::ATTR_SLUG, $slug)->first(); /** @var Course $dbCourse */

		$course              = new CourseDTO();
		$course->id          = $dbCourse->id;
		$course->title       = $dbCourse->title;
		$course->slug        = $dbCourse->slug;
		$course->description = $dbCourse->description;
		$course->viewPath    = $dbCourse->view_path;
		$course->imagePath   = $dbCourse->image->getUrl();
		$course->createdAt   = $dbCourse->created_at;
		$course->updatedAt   = $dbCourse->updated_at;

		return $course;
	}
}
