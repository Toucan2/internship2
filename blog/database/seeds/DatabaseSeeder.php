<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('accomodations')->insert([
            'id' => 4,
            'name' => 'Ap. Floresti',
            'description' => 'Foarte fain.',
            'phone number' => '0734746359',
            'price' => 456.23,
            'room count' => 3
        ]);
    }
}
