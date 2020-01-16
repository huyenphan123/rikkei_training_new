<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->Insert([
        ['id'=>1,'name'=>'root',
            'email'=>'root@gmail.com',
            'password'=>Hash::make('12345678'),
            'is_first_login'=>1]
    ]);
        Role::create([
            'user_id' => 1,
            'department_id' => null,
            'type' => 'Admin'
        ]);
    }
}
