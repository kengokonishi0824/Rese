<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '仙人',
            'prefecture_id' => '',
            'category_id' => '',
            'overview' => '',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);
        
    }
}
