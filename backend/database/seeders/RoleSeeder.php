<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'editor']);
        

        Permission::create(['name' => 'user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'bar.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'bar.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'bar.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'trago.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'trago.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'trago.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'tutorial.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tutorial.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tutorial.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'etiqueta.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'etiqueta.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'etiqueta.destroy'])->syncRoles([$role1,$role2]);
    }
}
