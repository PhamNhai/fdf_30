<?php

use Illuminate\Database\Seeder;
use App\Models\Suggest;

class SuggestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggest::truncate();
        factory(Suggest::class, 2)->create();
    }
}
