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
		$this->call('ContractorTableSeeder');
		$this->call('ContactTableSeeder');
		$this->call('ProjectTypeTableSeeder');
		$this->call('TenderStatusTableSeeder');
		$this->call('SubstrateTableSeeder');
		$this->call('ServiceTableSeeder');
		$this->call('ItemTableSeeder');
		$this->call('PriceTableSeeder');
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
				,'first_name'=> null
				,'last_name'=> null
			),
			array(
				 'id' 		=> 2
				,'role_id' 	=> 2
				,'username' => 'user2'
				,'password' => Hash::make('password')
				,'email' 	=> 'salesA@test.com'
				,'first_name'=> 'Sales'
				,'last_name'=> 'Representative A'
			),
			array(
				 'id' 		=> 3
				,'role_id' 	=> 2
				,'username' => 'user3'
				,'password' => Hash::make('password')
				,'email' 	=> 'salesB@test.com'
				,'first_name'=> 'Sales'
				,'last_name'=> 'Representative B'
			)
		));
	}
}


class ContractorTableSeeder extends seeder {
	public function run(){
		DB::table('contacts')->delete();
		DB::table('contractors')->delete();
		DB::table('contractors')->insert(array(
			array(
				 'id' 						=> 1
				,'name' 					=> 'Contractor ABC'
				,'email' 					=> 'contactorABC@email.com'
				,'phone' 					=> 'contractor-abc-123'
				,'business_address_street' 	=> 'test'
				,'business_address_suburb' 	=> 'test'
				,'business_address_state' 	=> 'test'
				,'business_address_zip' 	=> '111'
				,'postal_address_street' 	=> 'test'
				,'postal_address_suburb' 	=> 'test'
				,'postal_address_state' 	=> 'test'
				,'postal_address_zip' 		=> '222'
				,'abn' 						=> '12345'
			),
			array(
				 'id' 						=> 2				
				,'name' 					=> 'Contractor XYZ'
				,'email' 					=> 'contractorZYZ@email.com'
				,'phone' 					=> '12345'
				,'business_address_street' 	=> null
				,'business_address_suburb' 	=> null
				,'business_address_state' 	=> null
				,'business_address_zip' 	=> null
				,'postal_address_street' 	=> null
				,'postal_address_suburb' 	=> null
				,'postal_address_state' 	=> null
				,'postal_address_zip' 		=> null
				,'abn' 						=> null
			),
		));
	}
}

class ContactTableSeeder extends seeder {
	public function run(){
		DB::table('contacts')->delete();
		DB::table('contacts')->insert(array(
			array(
				 'contractor_id' 	=> 1
				,'name' 			=> 'Robert Mordido'
				,'email' 			=> 'robert@email.com'
				,'phone' 			=> '12345'
				,'grade' 			=> 'A'
			),
			array(				 
				 'contractor_id' 	=> 1
				,'name' 			=> 'Danielle Silcock'
				,'email' 			=> 'danielle@email.com'
				,'phone' 			=> '12345'
				,'grade' 			=> 'A'
			),
			array(				 
				 'contractor_id' 	=> 2
				,'name' 			=> 'John Doe'
				,'email' 			=> 'john@email.com'
				,'phone' 			=> '12345'
				,'grade' 			=> 'B'
			),
		));
	}
}

class ProjectTypeTableSeeder extends seeder {
	public function run(){
		DB::table('project_types')->delete();
		DB::table('project_types')->insert(array(
			 array('id' 	=> '101','name' => 'Body Corporate / Commercial')
			,array('id' 	=> '102','name' => 'New Construction')
			,array('id' 	=> '103','name' => 'Residential / Private')
		));
	}
}

class TenderStatusTableSeeder extends seeder {
	public function run(){
		DB::table('tender_status')->delete();
		DB::table('tender_status')->insert(array(
			 array('code' => '101','text' => 'Awaiting take off material')
			,array('code' => '102','text' => 'Awaiting quotation')
			,array('code' => '103','text' => 'Quotation sent')
		));
	}
}

class SubstrateTableSeeder extends seeder {
	public function run(){
		DB::table('substrates')->delete();
		DB::table('substrates')->insert(array(
			 array('id'=>1,'code'=>'BB','name' => 'Billaboard')
			,array('id'=>2,'code'=>'BW','name' => 'Block Work')
			,array('id'=>3,'code'=>'FC','name' => 'Fiber Cement')
			,array('id'=>4,'code'=>'OFC','name' => 'Off Form Concrete')
			,array('id'=>5,'code'=>'PB','name' => 'Plasterboard')
			,array('id'=>6,'code'=>'PBMR','name' => 'Plasterboard Moisture Resistant')
			,array('id'=>7,'code'=>'S','name' => 'Steel')
			,array('id'=>8,'code'=>'T','name' => 'Timber')
		));
	}
}

class ServiceTableSeeder extends seeder {
	public function run(){
		DB::table('services')->delete();
		DB::table('services')->insert(array(
			  array('id' => 1,'code'=>'P','name' => 'painting')
			 ,array('id' => 2,'code'=>'S','name' => 'rendering')
		));
	}
}

class ItemTableSeeder extends seeder {
	public function run(){
		DB::table('items')->delete();
		DB::table('items')->insert(array(
			  array('name' => 'Item A','service_code'=>'P')
			 ,array('name' => 'Item B','service_code'=>'P')
			 ,array('name' => 'Item C','service_code'=>'P')
			 ,array('name' => 'Item D','service_code'=>'P')
			 ,array('name' => 'Item E','service_code'=>'P')
		));
	}
}

class PriceTableSeeder extends seeder {
	public function run(){
		DB::table('item_prices')->delete();
		DB::table('item_prices')->insert(array(
			  array('item_id' => 1,'substrate_code'=>'BB','price'=>100)
			 ,array('item_id' => 1,'substrate_code'=>'BW','price'=>200)
			 ,array('item_id' => 1,'substrate_code'=>'FC','price'=>300)
			 ,array('item_id' => 1,'substrate_code'=>'OFC','price'=>400)
			 ,array('item_id' => 1,'substrate_code'=>'PB','price'=>500)
			 ,array('item_id' => 1,'substrate_code'=>'PBMR','price'=>600)
			 ,array('item_id' => 1,'substrate_code'=>'S','price'=>700)
			 ,array('item_id' => 1,'substrate_code'=>'T','price'=>800)
		));
	}
}