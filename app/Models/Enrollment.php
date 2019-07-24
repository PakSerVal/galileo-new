<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $name
 * @property $phone
 */
class Enrollment extends Model {
	const ATTR_ID    = 'id';
	const ATTR_NAME  = 'name';
	const ATTR_PHONE = 'phone';
}
