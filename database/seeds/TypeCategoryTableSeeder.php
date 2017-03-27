<?php

use Illuminate\Database\Seeder;
use App\Models\TypeCategory;

class TypeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeCategory::truncate();
        DB::table('type_categories')->insert(array(
            array('name' => 'Food'),
            array('name' => 'Drink'),
        ));
    }
}
