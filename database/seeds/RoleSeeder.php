<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create([
            'slug' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'Administrator',
        ]);

        Permission::create([
            'role_id' => $role->id,
            'slug' => 'administrator',
            'display_name' => 'Administrator',
        ]);
    }
}
