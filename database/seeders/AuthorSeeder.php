<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $authors = new Author();
        $authors->email = 'test@author.com';
        $authors->password = Hash::make('12345678');
        $authors->save();
        $authors->assignRole('ناشر سياسي');

        $users = new User();
        $users->first_name = 'Akram';
        $users->last_name = 'waleed';
        $users->gender = 'Male';
        $users->mobile = '0099887733';
        $users->status = 'Active';
        $users->date = '2023-08-02';
        $users->address = 'Khan';
        $users->city_id = '1';
        $users->actor()->associate($authors);
        $users->save();



    }
}
