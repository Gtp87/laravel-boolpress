<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->email = 'admin@admin.it';
        $string = '12345678';
        $newUser->password = Hash::make($string);
        $newUser->save();

        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            //creo una stringa da usare per accedere come password
            $string = '123_GG45';
            //la cripto per salvarla in db
            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}