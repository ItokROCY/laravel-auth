<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData =[
            [
                'name'      => 'Admin operator',
                'email'     => 'admin@localhost.com',
                'role'      => 'admin',
                'password'  =>bcrypt('admin')
            ],
            [
                'name'      => 'User',
                'email'     => 'user@localhost.com',
                'role'      => 'user',
                'password'  =>bcrypt('user')
            ],
        ];

        foreach($userData as $key => $val)
        {
            User::create($val);
        }
    }
}
