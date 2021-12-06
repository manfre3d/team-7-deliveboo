<?php

use Illuminate\Database\Seeder;
use App\RestaurantType;
use Illuminate\Support\Str;

class Restaurants_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $restaurantNames = [
            "Cinese",
            "Sushi",
            "Pizzeria",
            "Cucina molecolare",
            "Indiano",
        ];

        for ( $i = 0; $i < 5; $i++) {
            $newRestaurantsType = new RestaurantType();
            $newRestaurantsType->name = $restaurantNames[$i];
            $newRestaurantsType->slug = $this->getSlug($newRestaurantsType->name);
            $newRestaurantsType->save();
        }
    }

    // funzione per ricavare lo slug da name
    private function getSlug($name)
    {   
        // generates the slug
        $slug = Str::of($name)->slug('-');

        // checks if the slug generated is found in the User model
        $userExist = RestaurantType::where("slug", $slug)->first();

        // initializes a counter for the while cycle
        $count = 2;

        // while the slug generated is found in the User model,
        // the cycle concatenetes the $count variable to a newly generated slug (to create a unique slug)
        // and rechecks for the slug in the model
        while($userExist) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $userExist = RestaurantType::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
