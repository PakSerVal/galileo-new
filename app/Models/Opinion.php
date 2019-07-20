<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель отзывов.
 *
 * @property string $id
 * @property string $appeal
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property bool   $is_published
 *
 * @author Pak Sergey
 */
class Opinion extends Model {
	const ATTR_ID           = 'id';
	const ATTR_APPEAL       = 'appeal';
	const ATTR_TEXT         = 'text';
	const ATTR_CREATED_AT   = 'created_at';
	const ATTR_UPDATED_AT   = 'updated_at';
	const ATTR_IS_PUBLISHED = 'is_published';
}
