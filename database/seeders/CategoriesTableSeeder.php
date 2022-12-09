<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
    'category' => '寿司'
    ];
    Category::create($param);
    $param = [
    'category' => '焼肉'
    ];
    Category::create($param);
    $param = [
    'category' => 'イタリアン'
    ];
    Category::create($param);
    $param = [
    'category' => 'ラーメン'
    ];
    Category::create($param);
    }
}
