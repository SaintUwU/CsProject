<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating SuperAdmin User
        $superAdmin = User::create([
            'name' => 'Erick Mwaura', 
            'email' => 'Autoprovenance@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        //Creating CarOwner User
        $CarOwner = User::create([
            'name' => 'Owen the Owner', 
            'email' => 'OwenTheowner@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $CarOwner->assignRole('CarOwner');
          // Creating Product Manager User

          $Mechanic = User::create([
            'name' => 'Michael the Mechanic', 
            'email' => 'michaelthemechanic@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $Mechanic->assignRole('Mechanic');

    }
}
