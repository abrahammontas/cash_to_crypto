<?php

use App\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$banks = ['Credit Unions', 'City Bank', 'BB&T', 'PNC Bank', 'Huntington Bank', 'Citizens Bank'];
    	foreach ($banks as $name) {
    		Bank::create([
	            'name' => $name,
	            'company' => '',
	            'active' => true
	        ]);
    	}
       
    }
}
