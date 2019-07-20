<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

/**
 * Модель изображение.
 *
 * @property int    $id
 * @property string $path
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @author Pak Sergey
 */
class Image extends Model {
	const ATTR_ID         = 'id';
	const ATTR_PATH       = 'path';
	const ATTR_NAME       = 'name';
	const ATTR_CREATED_AT = 'created_at';
	const ATTR_UPDATED_AT = 'updated_at';

	public function getUrl() {
		return Storage::url($this->path);
	}
}
