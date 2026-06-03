<?php

namespace Database\Seeders;

use App\Models\Talk;
use Illuminate\Database\Seeder;

class TalkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Talk::factory()->createMany([

            // Day 1 Talks
            [
                'title' => 'Filament PHP v5: Novidades e visão geral',
                'description' => fake()->paragraph(),
                'start_time' => '10:00',
                'end_time' => '10:50',
                'event_day_id' => 1,
                'speaker_id' => 1,
                'confirmed' => true,
            ],
            [
                'title' => 'Design de interfaces modernas com Filament Forms',
                'description' => fake()->paragraph(),
                'start_time' => '11:00',
                'end_time' => '11:50',
                'event_day_id' => 1,
                'speaker_id' => 2,
                'confirmed' => true,
            ],
            [
                'title' => 'Livewire e Filament: trabalhando com eventos',
                'description' => fake()->paragraph(),
                'start_time' => '13:30',
                'end_time' => '14:20',
                'event_day_id' => 1,
                'speaker_id' => 3,
                'confirmed' => true,
            ],
            [
                'title' => 'Criando painéis escaláveis com Filament Admin',
                'description' => fake()->paragraph(),
                'start_time' => '14:30',
                'end_time' => '15:20',
                'event_day_id' => 1,
                'speaker_id' => 4,
                'confirmed' => true,
            ],
            [
                'title' => 'TALL Stack na prática: Criando páginas customizadas no Filament',
                'description' => fake()->paragraph(),
                'start_time' => '15:30',
                'end_time' => '16:20',
                'event_day_id' => 1,
                'speaker_id' => 5,
                'confirmed' => true,
            ],

            // Day 2 Talks
            [
                'title' => 'Aplicações com Filament: organização do código',
                'description' => fake()->paragraph(),
                'start_time' => '10:00',
                'end_time' => '10:50',
                'event_day_id' => 2,
                'speaker_id' => 6,
                'confirmed' => true,
            ],
            [
                'title' => 'Testes automatizados com Pest e Filament',
                'description' => fake()->paragraph(),
                'start_time' => '11:00',
                'end_time' => '11:50',
                'event_day_id' => 2,
                'speaker_id' => 7,
                'confirmed' => true,
            ],
            [
                'title' => 'APIs no Filament com Resources customizados',
                'description' => fake()->paragraph(),
                'start_time' => '13:30',
                'end_time' => '14:20',
                'event_day_id' => 2,
                'speaker_id' => 8,
                'confirmed' => true,
            ],
            [
                'title' => 'Agendamentos e tarefas automatizadas com Filament',
                'description' => fake()->paragraph(),
                'start_time' => '14:30',
                'end_time' => '15:20',
                'event_day_id' => 2,
                'speaker_id' => 9,
                'confirmed' => true,
            ],
            [
                'title' => 'Desenvolvimento de plugins e boas práticas',
                'description' => fake()->paragraph(),
                'start_time' => '15:30',
                'end_time' => '16:20',
                'event_day_id' => 2,
                'speaker_id' => 10,
                'confirmed' => true,
            ],
        ]);
    }
}
