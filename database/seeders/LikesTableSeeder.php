<?php

namespace Database\Seeders;
use App\Models\Like;

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'restaurant_id' => 1,
            'user_id' => 1
        ];
        Like::create($param);

        $param = [
            'restaurant_id' => 2,
            'user_id' => 1
        ];
        Like::create($param);

        $param = [
            'restaurant_id' => 3,
            'user_id' => 1
        ];
        Like::create($param);

        $param = [
            'restaurant_id' => 4,
            'user_id' => 1
        ];
        Like::create($param);
    }
}
