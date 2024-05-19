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
            if (file_exists(public_path('images/goodbye-cards'))) {
                File::deleteDirectory(public_path('images/goodbye-cards'));
            }
            File::makeDirectory(
                path: public_path('images/goodbye-cards'),
                recursive: true
            );


            GoodbyeCard::factory(100)->create();
        } else {
            if (!file_exists(public_path('images/goodbye-cards'))) {
                File::makeDirectory(
                    path: public_path('images/goodbye-cards'),
                    recursive: true
                );
            }
        }
    }
}
