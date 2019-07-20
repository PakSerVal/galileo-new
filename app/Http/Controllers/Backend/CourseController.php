<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Requests\CreateCourseRequest;
use App\Http\Controllers\Backend\Requests\EditCourseRequest;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

/**
 * Контроллер курсов в бэкенде.
 *
 * @author Pak Sergey
 */
class CourseController extends Controller {

	const ACTION_INDEX            = 'index';
	const ACTION_SHOW_CREATE_FORM = 'showCreateForm';
	const ACTION_SHOW_EDIT_FORM   = 'showEditForm';
	const ACTION_CREATE           = 'create';
	const ACTION_UPDATE           = 'update';
	const ACTION_DELETE           = 'delete';

	const VIEWS_PATH              = [
		'courses/ege'     => 'егэ',
		'courses/english' => 'английский',
		'courses/korean'  => 'корейсккий',
	];

	/** @var CourseRepository */
	private $courses;

	/**
	 * @param CourseRepository $courses
	 *
	 * @author Pak Sergey
	 */
	public function __construct(CourseRepository $courses) {
		$this->courses = $courses;
	}

	/**
	 * Список.
	 *
	 * @author Pak Sergey
	 */
	public function index() {
		$courses = $this->courses->getAll();

		return View::make('backend.courses.list', compact('courses'));
	}

	/**
	 * Форма создания курсов.
	 *
	 * @author Pak Sergey
	 */
	public function showCreateForm() {
		$course           = new Course();
		$viewPathVariants = static::VIEWS_PATH;

		return View::make('backend.courses.create', compact('course', 'viewPathVariants'));
	}

	/**
	 * Форма редактирования курсов.
	 *
	 * @param string $id Идентификатор курса
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function showEditForm(string $id) {
		$course = Course::find($id);

		if (null === $course) {
			redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$viewPathVariants = static::VIEWS_PATH;

		return View::make('backend.courses.edit', compact('course', 'viewPathVariants'));
	}

	/**
	 * Сохранение модели курсов.
	 *
	 * @param CreateCourseRequest $request Запрос
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function create(CreateCourseRequest $request) {
		$course              = new Course();
		$course->title       = $request->title;
		$course->description = $request->description;
		$course->view_path   = $request->view_path;
		$course->image_id    = $request->image_id;

		if ($course->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_CREATE_FORM));
	}

	/**
	 * Обновление модели курсов.
	 *
	 * @param EditCourseRequest $request
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function update(EditCourseRequest $request) {
		$course = Course::find($request->id);

		if (null === $course) {
			return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
		}

		$course->title       = $request->title;
		$course->description = $request->description;
		$course->view_path   = $request->view_path;

		if ($course->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
	}

	/**
	 * Удаление курса.
	 *
	 * @param string $id Идентификатор курса
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function delete(string $id) {
		$course = Course::find($id);
		if (null === $course) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$course->delete();

		return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
	}
}
