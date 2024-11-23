<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'mengelola-user']);
        Permission::create(['name' => 'mengelola-kategori']);
        Permission::create(['name' => 'laporan-barang']);
        Permission::create(['name' => 'mengelola-barang']);


        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);

        $roleadmin = Role::findByName('admin');
        $roleadmin->givePermissionTo('mengelola-user');
        $roleadmin->givePermissionTo('mengelola-kategori');
        $roleadmin->givePermissionTo('laporan-barang');
        $roleadmin->givePermissionTo('mengelola-barang');

        $rolestaff = Role::findByName('staff');
        $rolestaff->givePermissionTo('mengelola-barang');
        $rolestaff->givePermissionTo('laporan-barang');
    }
}
