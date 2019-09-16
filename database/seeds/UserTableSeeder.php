<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prueba= array(
        [  'name' => 'David',
          'last_name'=> 'Martinez',
          'birthday'=>'1988-10-04',
          'country'=>'arg',
          'sale'=>'1',
          'email'=>'davidm231@hotmail.com',
          'password'=> \Hash::make('Db123456'),
          'type'=>'admin',
          'active'=> '1',
          'created_at'=> new DateTime,
          'updated_at'=> new DateTime
        ],
        [ 'name' => 'Jelimar',
          'last_name'=> 'Lezama',
          'birthday'=>'1988-10-04',
          'country'=>'ven',
          'sale'=>'1',
          'email'=>'jely@hotmail.com',
          'password'=> \Hash::make('Db123456'),
          'type'=>'user',
          'active'=> '1',
          'created_at'=> new DateTime,
          'updated_at'=> new DateTime]);
          User::insert($prueba);
    }
}
