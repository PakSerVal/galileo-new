<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\EnrollmentRepository;
use View;

class EnrollmentController extends Controller {
	const ACTION_INDEX = 'index';

	/** @var EnrollmentRepository */
	private $enrollments;

	public function __construct(EnrollmentRepository $enrollments) {
		$this->enrollments = $enrollments;
	}

	public function index() {
		$enrollments = $this->enrollments->getAll();

		return View::make('backend.enrollments.list', compact('enrollments'));
	}
}