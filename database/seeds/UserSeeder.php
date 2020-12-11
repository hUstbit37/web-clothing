<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@gmail.com',
            'phone'             =>'01668100018',
            'gender'            =>1,
            'address'           =>'Ha Noi',
            'avatar'            =>'',
            'email_verified_at' => now(),
            'password'          => bcrypt(1),
            'remember_token'    => Str::random(10),
        ]);
        factory(App\Models\User::class,49)->create();
    }
}
