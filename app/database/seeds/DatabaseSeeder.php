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
			 array('id' => 1,'name' => 'Administrator')
			,array('id' => 2,'name' => 'Sales')
			,array('id' => 3,'name' => 'Operations')
			,array('id' => 4,'name' => 'Senior Estimator')
			,array('id' => 5,'name' => 'Estimator')
			,array('id' => 6,'name' => 'Supervisor')
			,array('id' => 7,'name' => 'Staff')
			,array('id' => 8,'name' => 'Contractor')
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
