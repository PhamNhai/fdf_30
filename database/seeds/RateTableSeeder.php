<?php

use Illuminate\Database\Seeder;
use App\Models\Rating;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rating::truncate();
        factory(Rating::class, 5)->create();
    }
}
