<?php

namespace Database\Factories;

use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LectureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->name,
            'date'          => date('Y-m-d'),
            'event_id'      => 1,
            'start_time'    => '00:00:00',
            'end_time'      => '05:00:00',
            'description'   => 'Test description',
            'speaker_id'    => 1
        ];
    }
}
