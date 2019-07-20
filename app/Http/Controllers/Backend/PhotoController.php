<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Requests\CreatePhotoRequest;
use App\Http\Controllers\Backend\Requests\EditPhotoRequest;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Repositories\PhotoRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

/**
 * Контроллер фото в бэкенде.
 *
 * @author Pak Sergey
 */
class PhotoController extends Controller {

	const ACTION_INDEX            = 'index';
	const ACTION_SHOW_CREATE_FORM = 'showCreateForm';
	const ACTION_SHOW_EDIT_FORM   = 'showEditForm';
	const ACTION_CREATE           = 'create';
	const ACTION_UPDATE           = 'update';
	const ACTION_DELETE           = 'delete';

	/** @var PhotoRepository */
	private $photos;

	/**
	 * @param PhotoRepository $photos
	 *
	 * @author Pak Sergey
	 */
	public function __construct(PhotoRepository $photos) {
		$this->photos = $photos;
	}

	/**
	 * Список.
	 *
	 * @author Pak Sergey
	 */
	public function index() {
		$photos = $this->photos->getAll();

		return View::make('backend.photos.list', compact('photos'));
	}

	/**
	 * Форма создания.
	 *
	 * @author Pak Sergey
	 */
	public function showCreateForm() {
		$photo = new Photo();

		return View::make('backend.photos.create', compact('photo'));
	}

	/**
	 * Форма редактирования.
	 *
	 * @param string $id Идентификатор фото
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function showEditForm(string $id) {
		$photo = Photo::find($id);

		if (null === $photo) {
			redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}


		return View::make('backend.photos.edit', compact('photo'));
	}

	/**
	 * Сохранение модели фото.
	 *
	 * @param CreatePhotoRequest $request Запрос
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function create(CreatePhotoRequest $request) {
		$photo           = new Photo();
		$photo->title    = $request->title;
		$photo->image_id = $request->image_id;


		if ($photo->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_CREATE_FORM));
	}

	/**
	 * Обновление модели.
	 *
	 * @param EditPhotoRequest $request
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function update(EditPhotoRequest $request) {
		$photo = Photo::find($request->id);

		if (null === $photo) {
			return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
		}

		$photo->title    = $request->title;
		$photo->image_id = 1; //todo-17.07.19-pak.s

		if ($photo->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_SHOW_EDIT_FORM));
	}

	/**
	 * Удаление фото.
	 *
	 * @param string $id Идентификатор фото
	 *
	 * @author Pak Sergey
	 *
	 * @return RedirectResponse
	 */
	public function delete(string $id) {
		$photo = Photo::find($id);
		if (null === $photo) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$photo->delete();

		return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
	}
}
