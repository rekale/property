<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	private $seeders;

	public function __construct()
	{
		$this->seeders = [
			UsersTableSeeder::class,
			ApartmentsSeeder::class,
		];
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Model::unguard();
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	$this->refresh();

    	foreach($this->seeders as $seeder) {
        	$this->call($seeder);	
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    	Model::reguard();
    }

    public function refresh()
    {

  		$col = 'Tables_in_' . config('database.connections.mysql.database');

  		$tables = DB::select('SHOW TABLES');

  		foreach ($tables as $table) {
        if($table->$col != 'migrations'){
          DB::table($table->$col)->truncate();
        }
  		}
    }

}
