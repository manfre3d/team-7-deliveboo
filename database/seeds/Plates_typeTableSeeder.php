<?php

use Illuminate\Database\Seeder;
use App\PlateType;

class Plates_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plateTypes = ["Antispasto", "Primo", "Secondo", "Dessert", "Bevande"];

        foreach ($plateTypes as $plateType) {
            $newPlateType = new PlateType();
            $newPlateType->name = $plateType;
            $newPlateType->save();
        }
    }
}
