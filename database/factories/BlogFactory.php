<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\BlogCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BlogFactory extends Factory
{

    /*public function __construct() {
        //$this->categories_ids = BlogCategory::has('parent.parent')->pluck('id');
        $this->categories_ids = BlogCategory::has('parent')
            ->doesntHave('parent.parent')->pluck('id');
    }*/

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_ru' => fake()->sentence(),
            'short_title_ru' => fake()->word(),
            //'email' => fake()->unique()->safeEmail(),
            //'email_verified_at' => now(),
            'url' => Str::random(10),
            'src' => '8wB4DDrI_Suerbj1CFsnAviA7TYV1UEK1P4qg7gyTXchGCPEw.jpg',
            'description_ru' => fake()->paragraph(),
            //'description_ru' => '123',
            //'category_id' => $this->categories_ids[mt_rand(0, count($this->categories_ids) - 1)]
            'category_id' => 7
        ];
    }

}
