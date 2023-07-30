<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'jerusalem',
            'description' => 'this is description of jerusalem',
            'image'=>'slider1.jpg',

        ]);
        Slider::create([
            'title' => 'Aswan',
            'description' => 'this is description of Aswan',
            'image'=>'slider2.jpg',

        ]);
        Slider::create([
            'title' => 'london',
            'description' => 'this is description of london',
            'image'=>'slider3.jpg',

        ]);
    }
}