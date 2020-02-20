<?php

declare(strict_types=1);

namespace App\Dto;

class ArticleDTO {
	public $id;
	public $title;
	public $content;
	public $isPublished;
	public $thumbImage;
	public $previewText;
	public $priority;
	public $createdAt;
	public $updatedAt;
}
