<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::truncate();
        factory(OrderDetail::class, 8)->create();
    }
}
