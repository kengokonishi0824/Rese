<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CtegoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
    'category' => 'らーめん'
    ];
    Category::create($param);
    $param = [
    'category' => '寿司'
    ];
    Category::create($param);
    $param = [
    'category' => 'イタリアン'
    ];
    Category::create($param);
    }
}
