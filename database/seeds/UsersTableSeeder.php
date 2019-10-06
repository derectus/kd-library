<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [
                'name' => 'Nuri Çilengir',
                'email' => 'test@nuricilengir.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345'),
                'city_id' => 35,
                'phone' => '+90(999) 999 9999',
                'address' => 'World',
                'zip' => '12345',
                'is_banned' => false,
                'is_admin' => true,
                'request_count' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Disconnectus Erectus',
                'email' => 'test@derectus.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('12345'),
                'city_id' => 34,
                'phone' => '+90(111) 111 1111',
                'address' => 'On Mars',
                'zip' => '54321',
                'is_banned' => false,
                'is_admin' => false,
                'request_count' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        User::insert($users);
    }
}
