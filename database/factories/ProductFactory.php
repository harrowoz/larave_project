<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $product_name=$this->faker->unique()->words($nb=2,$asText=true);
        $slug=Str::slug($product_name);
        $image_name =$this->faker->numberBetween(1,8).'.jpg';
        return [
            'title'=> Str::title($product_name),
            'slug'=>$slug,
            'sort_description'=>$this ->faker->text(200),
            'description'=>$this ->faker->text(500),
            'price'=>$this ->faker->numberBetween(100,200),
            'compare_price'=>$this ->faker->numberBetween(1,100),
            'category_id'=>$this ->faker->numberBetween(1,6),
            'qty'=>$this ->faker->numberBetween(100,200),
            'image' =>$image_name,
            'status'=>1,
        ];
    }
}
