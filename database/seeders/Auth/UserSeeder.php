<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Binyameen Malik',
            'email' => 'ymalik495@gmail.com',
            'cnic' => '37302-4338517-5',
            'password' => 'password',
            'email_verified_at' => now(),
            'status' => 1,
        ]);

        if (app()->environment(['local', 'testing'])) {
            // User::create([
            //     'name' => 'Test User',
            //     'email' => 'user@user.com',
            //     'password' => 'secret',
            //     'email_verified_at' => now(),
            //     'active' => true,
            // ]);
        }

        $this->enableForeignKeys();
    }
}
