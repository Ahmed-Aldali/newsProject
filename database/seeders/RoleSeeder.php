<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // roles
         Role::create(['name' => 'super Admin','guard_name' => 'admin']);
         Role::create(['name' => 'sub Admin','guard_name' => 'admin']);
         Role::create(['name' => 'super Author','guard_name' => 'author']);
         Role::create(['name' => 'sub Author','guard_name' => 'author']);

         Role::create(['name' => 'ناشر رياضي','guard_name' => 'author']);
         Role::create(['name' => 'ناشر سياسي','guard_name' => 'author']);
         Role::create(['name' => 'ناشر اقتصادي','guard_name' => 'author']);
         Role::create(['name' => 'ناشر تقني','guard_name' => 'author']);

         // permissions
         // country table
         // permission for Admin
         Permission::create(['name' => 'Index-Country','guard_name' => 'admin']);
         Permission::create(['name' => 'Create-Country','guard_name' => 'admin']);
         Permission::create(['name' => 'Edit-Country','guard_name' => 'admin']);
         Permission::create(['name' => 'Delete-Country','guard_name' => 'admin']);
         // permission for Author
         Permission::create(['name' => 'Index-Country','guard_name' => 'author']);
         Permission::create(['name' => 'Create-Country','guard_name' => 'author']);
         Permission::create(['name' => 'Edit-Country','guard_name' => 'author']);
         Permission::create(['name' => 'Delete-Country','guard_name' => 'author']);


         // City table
         // permission for Admin
         Permission::create(['name' => 'Index-City','guard_name' => 'admin']);
         Permission::create(['name' => 'Create-City','guard_name' => 'admin']);
         Permission::create(['name' => 'Edit-City','guard_name' => 'admin']);
         Permission::create(['name' => 'Delete-City','guard_name' => 'admin']);
         // permission for Author
         Permission::create(['name' => 'Index-City','guard_name' => 'author']);
         Permission::create(['name' => 'Create-City','guard_name' => 'author']);
         Permission::create(['name' => 'Edit-City','guard_name' => 'author']);
         Permission::create(['name' => 'Delete-City','guard_name' => 'author']);


          // Category table
         // permission for Admin
         Permission::create(['name' => 'Index-Category','guard_name' => 'admin']);
         Permission::create(['name' => 'Create-Category','guard_name' => 'admin']);
         Permission::create(['name' => 'Edit-Category','guard_name' => 'admin']);
         Permission::create(['name' => 'Delete-Category','guard_name' => 'admin']);
         // permission for Author
         Permission::create(['name' => 'Index-Category','guard_name' => 'author']);
         Permission::create(['name' => 'Create-Category','guard_name' => 'author']);
         Permission::create(['name' => 'Edit-Category','guard_name' => 'author']);
         Permission::create(['name' => 'Delete-Category','guard_name' => 'author']);


         // Article table
         // permission for Admin
         Permission::create(['name' => 'Index-Article','guard_name' => 'admin']);
         Permission::create(['name' => 'Create-Article','guard_name' => 'admin']);
         Permission::create(['name' => 'Edit-Article','guard_name' => 'admin']);
         Permission::create(['name' => 'Delete-Article','guard_name' => 'admin']);
         // permission for Author
         Permission::create(['name' => 'Index-Article','guard_name' => 'author']);
         Permission::create(['name' => 'Create-Article','guard_name' => 'author']);
         Permission::create(['name' => 'Edit-Article','guard_name' => 'author']);
         Permission::create(['name' => 'Delete-Article','guard_name' => 'author']);



    }
}