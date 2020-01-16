<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
           ['id'=>1, 'name'=>'Business Department', 'description'=> 'This is the department of monthly / quarterly / yearly development of business plans and strategies to submit to management for approval'] ,
            ['id'=>2, 'name'=>'Human Resouces Department', 'description'=> 'This is the department responsible for recruiting and developing human resources. Archive important documents, documents, administrative papers'],
            ['id'=>3, 'name'=>'Account Department', 'description'=>'This is the department for settlement of salary, bonus, contract payment and other regimes as prescribed by the enterprise. Manage sales, quantity of goods, fixed assets, liabilities, inventory, ...'],
            ['id'=>4, 'name'=>'Technical Department', 'description'=>'This is the department responsible for maintaining the system of machinery and equipment available in the factory to serve production activities'],
            ['id'=>5, 'name'=>'IT Department', 'description'=>'This is the department for writing software on multiple platforms to deliver products to customers'],
            ['id'=>6, 'name'=>'Quality Department ', 'description'=>'This is the department responsible for planning inspection, product quality management as required'],
        ]);
    }
}

