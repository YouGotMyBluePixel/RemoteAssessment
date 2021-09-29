<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        'path'=> $this->faker->name,
       'Html_Title'=> $this->faker->name,
       'Snippet_Description'=> $this->faker->name,
       'Html_Snippet'=> $this->faker->name,
       'Link_Title'=> $this->faker->name,
       'link_itself'=> $this->faker->name,
       'Open_tab' => $this->faker->name,
        ];
    }
}
