<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTablesSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => Str::random(8),
            'email' => 'admin@puce.edu.ec',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(8),
        ]);
        /*DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@puce.edu.ec',
            'password' => bcrypt('secret'),
        ]);*/
    }

}