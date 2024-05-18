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
            if (file_exists(storage_path('app/public/goodbye-cards'))) {
                File::deleteDirectory(storage_path('app/public/goodbye-cards'));
            }
            File::makeDirectory(storage_path('app/public/goodbye-cards'));


            GoodbyeCard::factory(100)->create();
        } else {
            if (!file_exists(storage_path('app/public/goodbye-cards'))) {
                File::makeDirectory(storage_path('app/public/goodbye-cards'));
            }
        }
    }
}
