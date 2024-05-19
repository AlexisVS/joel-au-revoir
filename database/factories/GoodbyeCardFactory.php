<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoodbyeCard>
 */
class GoodbyeCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hasAsset = $this->faker->boolean();
        $assetType = null;
        $assetPath = null;

        if ($hasAsset) {
            $assetType = $this->faker->randomElement(['image', 'video']);

            if ($assetType === 'image') {
                $assetPath = $this->faker->image(public_path('goodbye-cards'),);

                $assetPath = 'goodbye-cards/' . (pathinfo($assetPath, PATHINFO_BASENAME));
            } else {
                $assetPath = $this->faker->url();
            }
        }

        return [
            'author_name' => $this->faker->name(),
            'author_email' => $this->faker->email(),
            'message' => $this->faker->text(),
            'card_color' => $this->faker->boolean() ? $this->faker->hexColor() : null,
            'has_asset' => $hasAsset,
            'asset_type' => $assetType,
            'asset_path' => $assetPath,
        ];
    }
}
