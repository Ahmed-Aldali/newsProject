<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin::create([
        //     'email' => 'admin1@a.com',
        //     'password' => Hash::make('123456'),
            // 'first_name' => 'ali',
            // 'last_name' => 'moh',
            // 'gender' => 'Male',
            // 'mobile' => '059966785',
            // 'status' => 'Active',
            // 'date' => 'ali',
            // 'address' => 'test',
            // 'city_id' => '1',

        // ]);

        $admins = new Admin();
            $admins->email = 'test@admin.com';
            $admins->password = Hash::make('12345678');
            $admins->save();

            $admins->assignRole('super Admin');

            $users = new User();
            $users->first_name = 'mohammed';
            $users->last_name = 'Ali';
            $users->gender = 'Male';
            $users->mobile = '0022330495';
            $users->status = 'Active';
            $users->date = '2023-08-03';
            $users->address = 'gaza';
            $users->city_id = '1';
            $users->actor()->associate($admins);
            $users->save();

    }
}