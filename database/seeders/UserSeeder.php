<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $usuarios = User::get();
        if($usuarios->count() == 0) {
            User::create(array(
                'id' => 1,
				'name' => 'Hetilon',
                'email' => 'hetilon@gmail.com',
                'password' => Hash::make('Detilon61'),
            ));
        }
    }
}
