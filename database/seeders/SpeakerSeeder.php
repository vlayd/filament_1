<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::factory()->createMany([
            [
                'name' => 'Lucas Oliveira',
                'bio' => fake()->text,
                'photo' => 'speakers/lucas-oliveira.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/lucas-oliveira'],
                    ['type' => 'github', 'link' => 'https://github.com/lucas-oliveira'],
                ],
            ],
            [
                'name' => 'Juliana Fernandes',
                'bio' => fake()->text,
                'photo' => 'speakers/juliana-fernandes.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/juliana-fernandes'],
                    ['type' => 'github', 'link' => 'github.com/juliana-fernandes'],
                ],
            ],
            [
                'name' => 'Eduardo Martins',
                'bio' => fake()->text,
                'photo' => 'speakers/eduardo-martins.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/eduardo-martins'],
                    ['type' => 'github', 'link' => 'https://github.com/eduardo-martins'],
                ],
            ],
            [
                'name' => 'Camila Rocha',
                'bio' => fake()->text,
                'photo' => 'speakers/camila-rocha.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/camila-rocha'],
                    ['type' => 'github', 'link' => 'https://github.com/camila-rocha'],
                ],
            ],
            [
                'name' => 'Felipe Cardoso',
                'bio' => fake()->text,
                'photo' => 'speakers/felipe-cardoso.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/felipe-cardoso'],
                    ['type' => 'github', 'link' => 'https://github.com/felipe-cardoso'],
                ],
            ],

            [
                'name' => 'André Nunes',
                'bio' => fake()->text,
                'photo' => 'speakers/andre-nunes.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/andre-nunes'],
                    ['type' => 'github', 'link' => 'https://github.com/andre-nunes'],
                ],
            ],
            [
                'name' => 'Renata Lima',
                'bio' => fake()->text,
                'photo' => 'speakers/renata-lima.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/renata-lima'],
                    ['type' => 'github', 'link' => 'https://github.com/renata-lima'],
                ],
            ],
            [
                'name' => 'Thiago Barros',
                'bio' => fake()->text,
                'photo' => 'speakers/thiago-barros.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/thiago-barros'],
                    ['type' => 'github', 'link' => 'https://github.com/thiago-barros'],
                ],
            ],
            [
                'name' => 'Bianca Souza',
                'bio' => fake()->text,
                'photo' => 'speakers/bianca-souza.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/bianca-souza'],
                    ['type' => 'github', 'link' => 'https://github.com/bianca-souza'],
                ],
            ],
            [
                'name' => 'Fernando Cunha',
                'bio' => fake()->text,
                'photo' => 'speakers/fernando-cunha.png',
                'social_links' => [
                    ['type' => 'twitter', 'link' => 'https://twitter.com/fernando-cunha'],
                    ['type' => 'github', 'link' => 'https://github.com/fernando-cunha'],
                ],
            ],
        ]);
    }
}
