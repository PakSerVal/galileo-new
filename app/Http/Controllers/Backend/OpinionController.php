<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Requests\CreateOpinionRequest;
use App\Http\Controllers\Backend\Requests\EditOpinionRequest;
use App\Http\Controllers\Controller;
use App\Models\Opinion;
use App\Repositories\OpinionRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

/**
 * Контроллер отзывов в бэкенде.
 *
 * @author Pak Sergey
 */
class OpinionController extends Controller {

	const ACTION_INDEX            = 'index';
	const ACTION_SHOW_CREATE_FORM = 'showCreateForm';
	const ACTION_SHOW_EDIT_FORM   = 'showEditForm';
	const ACTION_CREATE           = 'create';
	const ACTION_UPDATE           = 'update';
	const ACTION_DELETE           = 'delete';

	/** @var OpinionRepository */
	private $opinions;

	/**
	 * @param OpinionRepository $opinions
	 *
	 * @author Pak Sergey
	 */
	public function __construct(OpinionRepository $opinions) {
		$this->opinions = $opinions;
	}

	/**
	 * Список.
	 *
	 * @author Pak Sergey
	 */
	public function index() {
		$opinions = $this->opinions->getAll();

		return View::make('backend.opinions.list', compact('opinions'));
	}

	/**
	 * Форма создания отзыва.
	 *
	 * @author Pak Sergey
	 */
	public function showCreateForm() {
		$opinion = new Opinion();

		return View::make('backend.opinions.create', compact('opinion'));
	}

	/**
	 * Форма редактирования отзыва.
	 *
	 * @param string $id Идентификатор отзыва
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function showEditForm(string $id) {
		$opinion = Opinion::find($id);

		if (null === $opinion) {
			redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}


		return View::make('backend.opinions.edit', compact('opinion'));
	}

	/**
	 * Сохранение модели курсов.
	 *
	 * @param CreateOpinionRequest $request Запрос
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function create(CreateOpinionRequest $request) {
		$opinion               = new Opinion();
		$opinion->text         = $request->text;
		$opinion->appeal       = $request->appeal;
		$opinion->is_published = $request->is_published || false;


		if ($opinion->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_CREATE_FORM));
	}

	/**
	 * Обновление модели отзывов.
	 *
	 * @param EditOpinionRequest $request
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function update(EditOpinionRequest $request) {
		$opinion = Opinion::find($request->id);

		if (null === $opinion) {
			return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
		}

		$opinion->text         = $request->text;
		$opinion->appeal       = $request->appeal;
		$opinion->is_published = $request->is_published || false;

		if ($opinion->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
	}

	/**
	 * Удаление отзыва.
	 *
	 * @param string $id Идентификатор курса
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function delete(string $id) {
		$opinion = Opinion::find($id);
		if (null === $opinion) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$opinion->delete();

		return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
	}
}
