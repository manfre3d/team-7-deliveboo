<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurantNames = [
            "Romano",
            "Trattoria Ben venga",
            "Boni Boni",
            "Goethe",
            "Ambrosia",
            "Trattoria di Johny",
            "Sfizio Contagioso",
            "La Statua",
            "Il Mangione",
            "L'Arlecchino",
            "Pulcinella",
            "I Quattro Canti",
            "I Tre re",
            "Il Gabbiano",
            "Il Culinario",
            "La Brasserie Valderice"

        ];

        $paragraphs = [
            "La patria del buon mangiare",
            "Dal 1841, il punto di riferimento per tutti i palermitani",
            "Bonta ed accoglienza, ad un prezzo aperto a tutti",
            "Servizio veloce e pietanze prelibate",
            "I pranzi in famiglia non sono il tuo forte, vieni da noi e i tuoi parenti ti ringrazieranno!",
            "La cucina per la famiglia, fatta in famiglia!",
            "Cucina siciliana moderna a base di ingredienti stagionali in un locale minimal arredato con lampadine sospese.",
            "Menù fissi con raffinati piatti italiani creativi in un locale elegante e contemporaneo con opere d'arte.",
            "Cucina siciliana creativa in un locale moderno, tra sedie impagliate e foto di jazzisti in bianco e nero.",
            "Ristorante sobrio con tavoli all'aperto che prepara piatti locali tra cui pasta, pesce e cannoli.",
            "Pasta, piatti di pesce e un'ampia carta dei vini, in una sala con soffitti in pietra o ai tavoli esterni."
        ];
        $password = [
            "prova123",
        ];
        $addresses = [
            "Via Roma, 14",
            "Via Liberta, 23",
            "Via Garibaldi, 2",
            "Lungomare Cristoforo Colombo, 3890",
            "Viale delle scienze, 5",
            "Piazza della Vittoria, 12"
        ];
        $images = [
            "restaurant_covers/seeder_images/file.jpg",
            "restaurant_covers/seeder_images/junk-food.jpg",
            "restaurant_covers/seeder_images/hamburgers.jpg",
            "restaurant_covers/seeder_images/english-breakfast.jpg",
            "restaurant_covers/seeder_images/chinese-food.jpg",
            "restaurant_covers/seeder_images/Spanish-Seafood-Paella.jpg",
            "restaurant_covers/seeder_images/spanish-cuisine.jpg"            
        ];

        for( $i = 0; $i < 15; $i++ ) {
            $newUser= new User();

            // generates a random name, between the contents of the array $restaurantName
            $newUser->name = $restaurantNames[rand(0,15)];

            // generates a random email
            $newUser->email = $faker->email();

            // salts a specific password contained in the array $password
            $newUser->password = Hash::make($password[0]);

            // generates a random description, between the contents of the array $paragraphs
            $newUser->description = $paragraphs[rand(0,10)];

            // generates random street address
            $newUser->address = $addresses[rand(0,5)];;

            // generetes a unique number that meets the requirement of the piva
            $newUser->piva = $this->getUnique(10000000000,99999999999,$faker);

            // slug generation
            $newUser->slug = $this->getSlug($newUser->name);

            // woraround to pass a path to the db
            $newUser->img_path = $images[rand(0,6)];

            $newUser->save();
        }
        
    }

    // funzione per ricavare lo slug da name
    private function getSlug($name)
    {   
        // generates the slug
        $slug = Str::of($name)->slug('-');

        // checks if the slug generated is found in the User model
        $userExist = User::where("slug", $slug)->first();

        // initializes a counter for the while cycle
        $count = 2;
        
        // while the slug generated is found in the User model,
        // the cycle concatenetes the $count variable to a newly generated slug (to create a unique slug)
        // and rechecks for the slug in the model
        while($userExist) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $userExist = User::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }

    // funzione per assicurarsi che il numero in piva è unique
    private function getUnique($min,$max,$faker)
    {   
        // generates a number between the given intervalls
        $number=$faker->numberBetween($min, $max);

        // checks if the piva number, that was generated in $number, is found in the User model
        $pivaExist = User::where("piva",$number)->first();


        // while the number(piva) generated is found in the User model,
        // the cycle concatenetes generates once more a number between the given interval
        // and rechecks in the user model to see if it's present.
        // when it's not present anymore the cycle stops 
        while($pivaExist){

            $number=$faker->numberBetween($min, $max);

            $pivaExist = User::where("piva",$number)->first();
        }

        return $number;
    }
}
