<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		DB::table('migrations')->insertOrIgnore($this->migrations);
	}

	protected $migrations = [
		[
			"id" => 1,
			"migration" => "2014_10_12_100000_create_password_resets_table",
			"batch" => 1
		],
		[
			"id" => 2,
			"migration" => "2014_10_12_000000_create_users_table",
			"batch" => 1
		],
		[
			"id" => 3,
			"migration" => "2019_08_19_000000_create_failed_jobs_table",
			"batch" => 1
		],
		[
			"id" => 4,
			"migration" => "2019_12_14_000001_create_personal_access_tokens_table",
			"batch" => 1
		],

	];
}
