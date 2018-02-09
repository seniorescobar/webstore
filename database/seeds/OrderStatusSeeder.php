<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            ['id' => 'oddano'],
            ['id' => 'potrjeno'],
            ['id' => 'preklicano'],
        ]);
    }
}
