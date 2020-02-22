<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Контроллер изобрадений в бэкенде.
 *
 * @author Pak Sergey
 */
class ImageController extends Controller {

	const ACTION_GET_ALL = 'getAll';
	const ACTION_UPLOAD  = 'upload';
	const ACTION_CKEDITOR_UPLOAD  = 'ckeditorUpload';

	public function getAll() {
		$images = Image::paginate(30);
		$result = [];
		foreach ($images as $image) {
			$result[] = [
				'id'  => $image->id,
				'src' => $image->getUrl(),
			];
		}

		return response()->json($result);
	}

	public function upload(Request $request) {
		$request->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$image = $this->uploadImage($request->image);

		return new JsonResponse([
			'id'  => $image->id,
			'src' => Storage::url($image->path),
		]);
	}

	public function ckeditorUpload(Request $request) {
		$request->validate([
			'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$image = $this->uploadImage($request->upload);

		if (null === $image) {
			return new JsonResponse([
				'uploaded' => false,
				'url'      => 'Не удалось загрузить изображение',
			]);
		}

		return new JsonResponse([
			'uploaded' => true,
			'url'      => Storage::url($image->path),
		]);
	}

	protected function uploadImage(UploadedFile $file): ?Image {
		$imageName = time() . '.' . $file->getClientOriginalExtension();

		$path = $file->store('public/img');

		$image = new Image();
		$image->name = $imageName;
		$image->path = $path;

		if (false === $image->save()) {
			return null;
		}

		return $image;
	}
}
