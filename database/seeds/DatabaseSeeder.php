<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('user_seeder');
        $this->call('post_seeder');
        $this->call('mission_seeder');
		$this->call('support_seeder');
	}

}
