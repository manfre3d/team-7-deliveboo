<?php

use Illuminate\Database\Seeder;
use App\RestaurantType;
use Illuminate\Support\Str;

class RestaurantsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantCategories = [
            [
                "name"=>"Cinese",
                "img"=>"cucina-cinese.jpg"
            ],
            [
                "name"=>"Sushi",
                "img"=>"cucina-sushi.jpg"
            ],
            [
                "name"=>"Pizzeria",
                "img"=>"cucina-pizza.webp"
            ],
            [
                "name"=>"Cucina molecolare",
                "img"=>"cucina-molecolare.jpg"
            ],
            [
                "name"=>"Indiano",
                "img"=>"cucina-indiana.jpg"
            ],
            [
                "name"=>"Italiano",
                "img"=>null
            ],
            [
                "name"=>"Steak-House",
                "img"=>null
            ],
            [
                "name"=>"Fast-food",
                "img"=>null
            ],
            [
                "name"=>"Greco",
                "img"=>null
            ],
        ];

        foreach($restaurantCategories as $category) {
            $newRestaurantsType = new RestaurantType();
            $newRestaurantsType->name = $category['name'];
            $newRestaurantsType->slug = $this->getSlug($newRestaurantsType->name);
            $newRestaurantsType->img_path = $category['img'];

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
