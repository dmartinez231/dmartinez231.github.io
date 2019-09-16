<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $prueba = array(
               [
                 'name' => 'Wine 1',
                 'year' => '2010',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 200,
                 'photo' => 'produc1.png',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 200
               ],
               [
                 'name' => 'Wine 2',
                 'year' => '1950',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 5000,
                 'photo' => 'produc2.png',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 15
               ],
               [
                 'name' => 'Wine 3',
                 'year' => '1988',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 100,
                 'photo' => 'produc3.jpeg',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 150
               ],
               [
                 'name' => 'Wine 4',
                 'year' => '1995',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 500,
                 'photo' => 'produc4.jpeg',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 400
               ],
               [
                 'name' => 'Wine 5',
                 'year' => '2000',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 300,
                 'photo' => 'produc5.png',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 900
               ],
               [
                 'name' => 'Wine 6',
                 'year' => '1970',
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
                 'price' => 3000,
                 'photo' => 'produc6.jpeg',
                 'created_at' 	=> new DateTime,
                 'updated_at' 	=> new DateTime,
                 'stock' => 120
               ]
             );
             Product::insert($prueba);
    }
}
