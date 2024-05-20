<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'Super Admin']);
        $CarOwner = Role::create(['name' => 'CarOwner']);
        $Mechanic = Role::create(['name' => 'Mechanic']);

        $CarOwner->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product'
        ]);

        $Mechanic->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
    }

