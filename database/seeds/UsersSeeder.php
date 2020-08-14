<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'id' => '1',
			'name' => 'admin',
			'email' => 'admin@mail.com',
			'password' => '$2y$10$5dnfhDoZ95RU6rqq.h.XuemEKrP1U910.A9ycaaag702Srm6T4qVK',
		]);

		DB::table('users')->insert([
			'id' => '2',
			'name' => 'user',
			'email' => 'user@mail.com',
			'password' => '$2y$10$5dnfhDoZ95RU6rqq.h.XuemEKrP1U910.A9ycaaag702Srm6T4qVK',
		]);
	}
}
