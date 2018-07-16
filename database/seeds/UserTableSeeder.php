<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Michael',
            'email' => 'sistemas@vw-munich.com.mx',
            'password' => bcrypt('123456'),
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', 'admin')->first());
        return $user;
    }
}
