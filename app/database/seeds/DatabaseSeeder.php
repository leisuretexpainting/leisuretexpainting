<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
	}

}

class RoleTableSeeder extends seeder {
	public function run(){
		DB::table('users')->delete();
		DB::table('roles')->delete();
		DB::table('roles')->insert(array(
			 array('id' => 1,'title' => 'Administrator')
			,array('id' => 2,'title' => 'Sales')
			,array('id' => 3,'title' => 'Operations')
			,array('id' => 4,'title' => 'Senior Estimator')
			,array('id' => 5,'title' => 'Estimator')
			,array('id' => 6,'title' => 'Supervisor')
			,array('id' => 7,'title' => 'Staff')
			,array('id' => 8,'title' => 'Contractor')
		));
	}
}


class UserTableSeeder extends seeder {
	public function run(){
		DB::table('users')->delete();
		DB::table('users')->insert(array(
			array(
				 'id' 		=> 1
				,'role_id' 	=> 1
				,'username' => 'leisuretexpainting'
				,'password' => Hash::make('System2015')
				,'email' 	=> 'admin@leisuretexpainting.com.au'
			)
		));
	}
}
