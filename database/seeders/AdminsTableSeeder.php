<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('password'),
            'VPN' => '0',
            'admin_level' => 1
        ];
        Admin::create($param);

        $param = [
            'name' => 'sub',
            'email' => 'sub@example.com',
            'password' => Hash::make('password'),
            'VPN' => '0',
            'admin_level' => 0
        ];
        Admin::create($param);

        $param = [
            'name' => '仙人マネジャー',
            'email' => 'manger@example.com',
            'password' => Hash::make('password'),
            'VPN' => '1',
            'admin_level' => 2
        ];
        Admin::create($param);
    }
}
