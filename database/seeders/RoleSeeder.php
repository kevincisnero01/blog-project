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
        //1 - CREATE ROLES
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        //2 - CREATE PERMISSIONS & A ASSIGN TO ROLES
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.update'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1,$role2]);
    }
}
