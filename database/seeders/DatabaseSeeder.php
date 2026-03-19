<?php

namespace Database\Seeders;

use App\Jobs\SendMail;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();

        // $users = User::factory()->count(10)->create();

        // foreach ($users as $user) {
        //     Mail::to($user->email)->queue(new WelcomeUserMail());
        // }

        User::factory(10)->create()->each(function ($user) {
            SendMail::dispatch($user);
        });

        // $this->call([
        //     UserSeeder::class,
        //     // Add other seeders here
        // ]);
    }
}
