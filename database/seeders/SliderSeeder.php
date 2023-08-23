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

        $sliders = new Slider();
        $jsonTitle = [
            'ar' => "القدس",
            'en' => 'jerusalem'
        ];
        $jsonDesc = [
            'ar' => 'هذه مدينة القدس العريقة',
            'en' => 'this is description of jerusalem'
        ];
        $sliders->title = json_encode($jsonTitle);
        $sliders->description = json_encode($jsonDesc);
        $sliders->image = 'slider1.jpg';
        $sliders->save();

        
        $sliders = new Slider();
        $jsonTitle = [
            'ar' => "أسوان",
            'en' => 'Aswan'
        ];
        $jsonDesc = [
            'ar' => 'هذه مدينة أسوان المصرية',
            'en' => 'this is description of Aswan'
        ];
        $sliders->title = json_encode($jsonTitle);
        $sliders->description = json_encode($jsonDesc);
        $sliders->image = 'slider2.jpg';
        $sliders->save();


        $sliders = new Slider();
        $jsonTitle = [
            'ar' => "لندن",
            'en' => 'london'
        ]; 
        $jsonDesc = [
            'ar' => 'هذه مدينة لندن البريطانية',
            'en' => 'this is description of london'
        ];
        $sliders->title = json_encode($jsonTitle);
        $sliders->description = json_encode($jsonDesc);
        $sliders->image = 'slider3.jpg';
        $sliders->save();



        // Slider::create([
        //     'title' => 'jerusalem',
        //     'description' => 'this is description of jerusalem',
        //     'image'=>'slider1.jpg',

        // ]);

        // Slider::create([ 
        //     'title' => 'Aswan',
        //     'description' => 'this is description of Aswan',
        //     'image'=>'slider2.jpg',

        // ]);

        // Slider::create([
        //     'title' => 'london',
        //     'description' => 'this is description of london',
        //     'image'=>'slider3.jpg',

        // ]);
        
    }
}