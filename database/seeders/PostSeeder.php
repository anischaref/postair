<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3
        ? collect( [
            User::create([
                'name' => 'Alice',
                'email' => 'alice@gmail.com',
                'password'=> bcrypt('password'),
            ]),
            User::create([
                'name' => 'yacine',
                'email' => 'yacine@gmail.com',
                'password'=> bcrypt('password'),
            ]),
            User::create([
                'name' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'password'=> bcrypt('password'),
            ]),
        ])
        : User::take(3)->get();

        $posts = [
            "new to Laravel, how exciting",
            "Aliquid ea minus architecto atque vero temporibus consectetur voluptates",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. ",
            " quisquam assumenda nostrum, quaerat et. Sunt dolores provident pariatur quibusdam, at laborum incidunt?",
            "Bonjour👍",

        
        ];

        foreach($posts as $message) {
            $time = now()->subMinutes(rand(5, 1440));
            $users->random()->posts()->create([
                'message' => $message,
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }
    }
}
