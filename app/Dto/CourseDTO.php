<?php

declare(strict_types=1);

namespace App\Dto;

/**
 * Модель данных курса.
 *
 * @author Pak Sergey
 */
class CourseDTO {
	public $id;
	public $title;
	public $description;
	public $viewPath;
	public $imagePath;
	public $createdAt;
	public $updatedAt;
}
