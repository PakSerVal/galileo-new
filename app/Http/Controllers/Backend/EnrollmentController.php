<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Repositories\EnrollmentRepository;
use View;

class EnrollmentController extends Controller {
	const ACTION_INDEX  = 'index';
	const ACTION_DELETE = 'delete';

	/** @var EnrollmentRepository */
	private $enrollments;

	public function __construct(EnrollmentRepository $enrollments) {
		$this->enrollments = $enrollments;
	}

	public function index() {
		$enrollments = $this->enrollments->getAll();

		return View::make('backend.enrollments.list', compact('enrollments'));
	}

	public function delete(string $id) {
		$enrollment = Enrollment::find($id);
		if (null === $enrollment) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$enrollment->delete();

		return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
	}
}