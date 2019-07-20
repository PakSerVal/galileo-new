<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('courses')->insert([
			'name'     => 'admin',
			'email'    => 'galileo-center@gmail.com',
			'password' => Hash::make('ghbrhsnbt321'),
		]);
	}
}
