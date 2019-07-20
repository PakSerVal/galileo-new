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
		//todo-13.07.19-pak.s Обернуть в кэш
		$result    = [];
		$dbCourses = Course::all();

		foreach ($dbCourses as $dbCourse) {
			$course              = new CourseDTO();
			$course->id          = $dbCourse->id;
			$course->title       = $dbCourse->title;
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
		$course->description = $dbCourse->description;
		$course->viewPath    = $dbCourse->view_path;
		$course->imagePath   = $dbCourse->image->getUrl();
		$course->createdAt   = $dbCourse->created_at;
		$course->updatedAt   = $dbCourse->updated_at;

		return $course;
	}
}
