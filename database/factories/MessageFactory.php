<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->paragraph(1),
            'state' => $this->faker->randomElement($array = array ('В очереди','Завершено','Ошибка')),
            'aid' => '2',
            'src' => '2',
            'created_at' =>$this->faker->dateTimeInInterval($startDate = '- 3 hours', $interval = '+ 2 hours', $timezone = null),
            'updated_at' =>$this->faker->dateTimeInInterval($startDate = '- 1 hour', $interval = '+ 1 hour', $timezone = null),
        ];
    }
}
