<?php

namespace Database\Seeders;

use App\Models\GoodbyeCard;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (env('APP_ENV') === 'development') {
            if (file_exists(public_path('goodbye-cards'))) {
                File::deleteDirectory(public_path('goodbye-cards'));
            }
            File::makeDirectory(public_path('goodbye-cards'));


            GoodbyeCard::factory(100)->create();
        } else {
            if (!file_exists(public_path('goodbye-cards'))) {
                File::makeDirectory(public_path('goodbye-cards'));
            }
        }
    }
}
