<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Валерий Булаш', 'email' => 'vbulash@yandex.ru', 'password' => 'AeebIex1'],
            ['name' => 'Наталья Булаш', 'email' => 'natalya@bulash.ru', 'password' => 'Nata1979']
        ];

        foreach ($users as $u) {
            $user = new User();
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = bcrypt($u['password']);
            $user->save();
        }
    }
}
