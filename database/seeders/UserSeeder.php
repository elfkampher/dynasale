<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Carlos',
            'phone' => '4428908887',
            'email' => 'jgutierrez@stocksillustrated.com.mx',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('AlphaJuliet2018?*')
        ]);
        User::create([
            'name' => 'Alejandra Soledad',
            'phone' => '4428908887',
            'email' => 'alesol@stocksillustrated.com.mx',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('AlphaJuliet2018?*')
        ]);
    }
}
