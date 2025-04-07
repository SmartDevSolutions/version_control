<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'make:admin';

    protected $description = 'Creates a new admin user via CLI';

    public function handle()
    {
        $name = $this->ask('Enter the user\'s full name');
        $email = $this->ask('Enter the user\'s email');
        $password = $this->secret('Enter a password');

        if (User::where('email', $email)->exists()) {
            $this->error('⚠️ A user with that email already exists.');
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info("✅ Admin user '{$user->email}' created successfully.");
    }
}
