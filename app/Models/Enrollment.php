<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель данных записи на курс.
 *
 * @property string $name
 * @property string $phone
 *
 * @author Pak Sergey
 */
class Enrollment extends Model {
	const ATTR_NAME  = 'name';
	const ATTR_PHONE = 'phone';
}
