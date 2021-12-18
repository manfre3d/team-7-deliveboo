<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ( $i = 0; $i < 1550; $i++) {
            $newOrder = new Order();
            $newOrder->user_id = $faker->numberBetween(1, 15) ;
            $newOrder->total_price = $faker->randomFloat(2, 1, 200);
            $newOrder->customer_name = $faker->firstName($gender = null);
            $newOrder->customer_surname = $faker->lastName();
            $newOrder->customer_email = $faker->email();
            $newOrder->customer_phone_number = $faker->phoneNumber();
            $newOrder->customer_address = $faker->address();
            $newOrder->timestamps = false;
            $newOrder->created_at = $this->getRandomMonth('2021');
            $newOrder->save();
        }
    }

    public function getRandomMonth($year)
    {
        $month = rand(1, 12);
        $day = rand(1, 25);
        return "{$year}-{$month}-{$day}";
    }
}
