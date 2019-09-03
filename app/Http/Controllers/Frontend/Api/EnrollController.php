<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Frontend\Api\Requests\EnrollRequest;
use App\Models\Enrollment;

class EnrollController extends ApiController {
	const ACTION_ENROLL = 'enroll';

	public function enroll(EnrollRequest $request) {
		$enrollment = new Enrollment();
		$enrollment->name  = $request->name;
		$enrollment->phone = $request->phone;

		mail("galileo.center.artem@gmail.com", "Запись на курсы", "Имя: $request->name, Телефон: $request->phone");

		$enrollment->save();
	}
}
