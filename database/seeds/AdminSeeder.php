<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\User::create([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'alamat' => 'cerih',
          'email_verified_at' => now(),
          'password' => bcrypt('1q2w3e4r5tokok'),
          'admin' => 1,
          'approved_at' => now(),
      ]);
    }
}
