<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Victor Ferreira Cheles',
            'email'     => 'contato@devcheles.com.br',
            'telephone' => 999999999,
            'telephone_ddd' => 11,
            'telephone_whatsapp' => 1,
            'profile_picture' => '/',
            'password'  => bcrypt('123456'),
        ]);
    }
}
