<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyUsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'company_name' => $this->faker->name() . " Tech LTD",
            'name' => $this->faker->name(),
            'company_email' => $this->faker->unique()->safeEmail(),
            'created_at' => now()
            
        ];
    }
}
