<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('admin123');
        $admin->role = 'admin';
        $admin->save();

        $admin = new User;
        $admin->name = 'rafi';
        $admin->email = 'rafi@gmail.com';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('pelanggan123');
        $admin->role = 'pelanggan';
        $admin->save();
    }
}
