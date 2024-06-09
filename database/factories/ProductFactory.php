<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category_id' => Category::factory(),
            'description' => $this->faker->optional()->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'photo' => $this->faker->imageUrl(640, 480, 'technics'),
            'expiration_date' => $this->faker->optional()->date(),
            'stock' => 10,
            'sku' => Str::uuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
