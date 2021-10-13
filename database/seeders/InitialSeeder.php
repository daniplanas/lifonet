<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Card;
use App\Models\Container;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');
        $data = [
            'key' => 'admin',
            'name' => 'Administrator',
            'description' => 'Admin user'
        ];
        $admin = Role::create($data);
        $data = [
            'key' => 'company',
            'name' => 'Company',
            'description' => 'Company user'
        ];
        $company = Role::create($data);
        $data = [
            'key' => 'user',
            'name' => 'User',
            'description' => 'Public user'
        ];
        $user = Role::create($data);
        unset($data);

        $data = [
            'key' => '1-vivienda',
            'name' => '1ª Vivienda',
            'description' => '-'
        ];
        PropertyType::create($data);
        $data = [
            'key' => '1-vivienda',
            'name' => '2ª Vivienda',
            'description' => '-'
        ];
        PropertyType::create($data);
        $data = [
            'key' => 'oficina',
            'name' => 'Oficina',
            'description' => '-'
        ];
        PropertyType::create($data);
        unset($data);
        $data = [
            'name' => 'Admin',
            'last_name' => 'Surname',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            'role_id' => $admin->id,
        ];
        User::create($data);
        $data = [
            'name' => 'Customer',
            'last_name' => 'Surname',
            'email' => 'customer@example.com',
            'password' => Hash::make('secret'),
            'role_id' => $company->id,
        ];
        $accountUser = User::create($data);
        $account = Account::create([
            'user_id' => $accountUser->id,
            'name' => $faker->company,
            'legal_name' => $faker->companySuffix,
            'email' => $faker->unique()->email,
            'phone' => $faker->phoneNumber,
            'vat' => $faker->vat,
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'postal_code' => $faker->postcode,
        ]);
        for ($i = 0; $i < 100; $i++) {
            $propertyType = PropertyType::inRandomOrder()->first();
            $newUser = User::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'role_id' => $user->id,
                'password' => Hash::make('secret'),
            ]);
            Card::create([
                'user_id' => $newUser->id,
                'code' => $faker->ipv6
            ]);
            Property::create([
                'account_id' => $account->id,
                'user_id' => $newUser->id,
                'property_type_id' => $propertyType->id,
                'address' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'floor_door' => $faker->randomDigit(),
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'postal_code' => $faker->postcode,
                'description' => $faker->text(300),
                'active' => true,
                'status' => 1,
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            Container::create([
                'code' => Str::random(10),
                'lat' => $faker->latitude,
                'long' => $faker->longitude,
                'address' => $faker->streetAddress,
                'postal_code' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'type' => random_int(1,4)
            ]);
        }
    }
}
