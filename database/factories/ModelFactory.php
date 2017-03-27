<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar'=> $faker->imageUrl(100, 100),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'role' => 'user',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'type_id' => $faker->numberBetween(1, 2),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker){
    static $categoryIds;

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl(200, 200),
        'quantity' => $faker->numberBetween(1, 20),
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'rate' => $faker->randomFloat(2, 1, 5),
        'price' => $faker->randomFloat(2, 1, 20),
        'status' => '1',
        'sum_comment' => $faker->numberBetween(0, 20),
        'sum_rate' => $faker->numberBetween(1, 20),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker){
    static $userIds;
    static $productIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'product_id' => $faker->randomElement($productIds ?: $productIds = App\Models\Product::pluck('id')->toArray()),
        'content' => $faker->paragraph,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Rating::class, function (Faker\Generator $faker){
    static $userIds;
    static $productIds;

    return [
        'product_id' => $faker->randomElement($productIds ?: $productIds = App\Models\Product::pluck('id')->toArray()),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'rate' => $faker->numberBetween(1, 5),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Order::class, function (Faker\Generator $faker){
    static $userIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'price' => $faker->randomFloat(2, 1, 40),
        'ship_address' => $faker->address,
        'status' => $faker->boolean,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\OrderDetail::class, function (Faker\Generator $faker){
    static $orderIds;
    static $productIds;

    return [
        'order_id' => $faker->randomElement($orderIds ?: $orderIds = App\Models\Order::pluck('id')->toArray()),
        'product_id' => $faker->randomElement($productIds ?: $productIds = App\Models\Product::pluck('id')->toArray()),
        'quantity' => $faker->numberBetween(1, 5),
        'price' => $faker->randomFloat(2, 1, 40),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Suggest::class, function (Faker\Generator $faker){
    static $userIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'status' => $faker->boolean,
        'content' =>$faker->paragraph,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
