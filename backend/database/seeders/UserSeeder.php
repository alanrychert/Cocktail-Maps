<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alan = User::create(array(
            'name' => 'alan',
            'email' => 'alanrychert@hotmail.com',
            'password' => bcrypt('admin'),
        ))->assignRole('admin');
        

        $diego = User::create(array(
            'name' => 'DiegoCM',
            'email' => 'dcm@cs.uns.edu.ar',
            'email_verified_at' => now(),
            'password' => bcrypt('dcmweb'),
        ))->assignRole('admin');
        
    }
}
