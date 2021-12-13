
<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Plate;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = [
            'Agnolini mantovani in brodo',
            'Agnolotti piemontesi al Plin',
            'Agnolotti pavesi in brodo d’oca',
            'Anelletti al forno',
            'Anolini in brodo',
            'Bucatini alla Amatriciana',
            'Caccavelle alla sorrentina',
            'Cannelloni ricotta e spinaci',
            'Canederli allo speck in brodo',
            'Capunsei mantovani burro e salvia'
        ];
        $descriprions = [
            'Piatto mantovano tradizionale di Agnolini (un tipo di pasta all\'uovo, ripiena con stracotto di manzo al vino bianco, salamella di maiale, pancetta, uova, noce moscata, pan grattato, sale e pepe), in brodo di carne',
            'Ricetta di Agnolotti (P.A.T.) conditi con ragù piemontese[3]',
            'Ricetta pavese di Agnolotti in brodo di oca',
            'Piatto palermitano di pasta al forno, preparato con Anelletti melanzane, sugo di carne, formaggio e piselli',
            'Piatto piacentino di Anolini (pasta all\'uovo ripieno con carne di manzo, pane grattugiato, formaggio) in brodo',
            'Piatto di Battolli (una pasta a base di farina di grano, farina di castagne e sale, P.A.T.), conditi con una salsa a base di pesto, navoni e patate',
            'Bigoli (una pasta a base di farina integrale), conditi con una salsa a base di acciughe e cipolla. Nella variante dei "bigoli mori" si fa uso della farina di grano saraceno.',
            'Bigoli (una pasta a base di farina integrale), conditi con un ragù a base di anatra',
            'Ricetta veronese di Bigoli (una pasta a base di farina integrale), conditi con un ragù a base di asino',
            'Tradizionale pasta friulana a forma di pezza, simili ai Maltagliati. È ottenuta impastando farina integrale di grano tenero con farina di grano saraceno e uova. Solitamente i blecs sono conditi con burro e con il formaggio regionale Montasio oppure con ricotta affumicata.'
        ];
        $ingredients = [
            "spaghetti, tonno sott'olio, aglio, scorza di un limone, olio extra vergine d'oliva, prezzemolo",
            "pomodoro, sale, cucchiai di ricotta, olio d'oliva, cipolla, uova, peperoncino",
            "lenticchie, carota, sedano, patata, pomodoro, pancetta dolce, vino bianco, rosmarino, olio d'oliva",
            "pasta sfoglia, prosciutto cotto, provola dolce, uova",
            "farina, patate, zucchero, sale, olio d'oliva, rosmarino, lievito di birra"
        ];

        // ne genero 10 realistici e il resto con dei faker
        for( $i = 0; $i < 10; $i++ ) {
            $newPlate = new Plate();
            $newPlate->user_id = rand(1, 15);
            $newPlate->plate_type_id = rand(1, 5);
            $newPlate->name = $names[$i];
            $newPlate->description = $descriprions[$i];
            $newPlate->ingredients = $ingredients[rand(0, 4)];
            $newPlate->price = rand(10, 500) / 10;
            $newPlate->availability = true;
            $newPlate->save();
        }

        for( $i = 0; $i < 90; $i++ ) {
            $newPlate = new Plate();
            $newPlate->user_id = rand(1, 15);
            $newPlate->plate_type_id = rand(1, 5);
            $newPlate->name = $faker->words(3, true);
            $newPlate->description = $faker->text();
            $newPlate->ingredients = $faker->text();
            $newPlate->price = rand(10, 500) / 10;
            $newPlate->availability = true;
            $newPlate->save();
        }
    }
}
