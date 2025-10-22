<?php

namespace Database\Factories;

use App\Enums\StockStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->words(2, true);

        return [
            'name' => Str::title($name),
            'sku' => strtoupper(Str::random(8)),
            'type' => $this->faker->randomElement(['simple', 'variable', 'digital']),
            'image' => $this->faker->imageUrl(640, 640, 'products', true, $name),
            'stock_status' => $this->faker->randomElement([
                StockStatus::InStock,
                StockStatus::LowStock,
                StockStatus::OutOfStock,
            ]),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory(),
        ];
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'Out of Stock',
        ]);
    }

    /**
     * Indicate that the product is low stock.
     */
    public function lowStock(): static
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'Low Stock',
        ]);
    }
}
