<?php

namespace Database\Seeders;

use App\Models\Container;
use App\Models\Property;
use Illuminate\Database\Seeder;

class updateGpsCoordinates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $containers = Container::all();
        foreach($containers as $container){
            $container->country = 'España';
            $container->city = 'Barcelona';
            $container->lat = 41.38773;
            $container->long = 2.1694;
            $container->save();
        }
        $properties = Property::all();
        foreach($properties as $property){
            $container->country = 'España';
            $property->city = 'Barcelona';
            $property->lat = 41.38773;
            $property->long = 2.1694;
            $property->save();
        }

    }
}
