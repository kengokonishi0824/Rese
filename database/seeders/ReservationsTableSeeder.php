<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
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
            'user_id' => 1,
            'reservation_date' => Carbon::yesterday()->format('Y-m-d'),
            'reservation_time' => '12:00',
            'number_people' => 2
        ];
        Reservation::create($param);

        $param = [
            'restaurant_id' => 2,
            'user_id' => 1,
            'reservation_date' => Carbon::yesterday()->format('Y-m-d'),
            'reservation_time' => '17:00',
            'number_people' => 4,
            'stars' => 3,
            'comment' => 'とっても美味しかったです。'
        ];
        Reservation::create($param);

        $param = [
            'restaurant_id' => 4,
            'user_id' => 1,
            'reservation_date' => Carbon::today()->format('Y-m-d'),
            'reservation_time' => '13:00',
            'number_people' => 4
        ];
        Reservation::create($param);

        $param = [
            'restaurant_id' => 3,
            'user_id' => 1,
            'reservation_date' => Carbon::tomorrow()->format('Y-m-d'),
            'reservation_time' => '20:00',
            'number_people' => 12
        ];
        Reservation::create($param);
    }
}
