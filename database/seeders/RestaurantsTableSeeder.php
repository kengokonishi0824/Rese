<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;


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
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);
        
    $param = [
            'name' => '仙人',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => '仙人',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => '仙人',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);
    }
}
