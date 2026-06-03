<?php

namespace Database\Seeders;

use App\Models\EventDay;
use Illuminate\Database\Seeder;

class EventDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventDay::factory()->createMany([
            [
                'event_id' => 1,
                'date' => '2026-06-19',
                'description' => 'Um dia de imersão no Filament PHP, com foco nas novidades da v4, boas práticas com TALL Stack e criação de interfaces eficientes. Perfeito para iniciantes e quem busca atualização.',
                'image' => 'event-day-1.png',
            ],
            [
                'event_id' => 1,
                'date' => '2026-06-20',
                'description' => 'Um dia voltado a temas avançados, abordando segurança, testes, automações e integrações com o ecossistema Laravel. Ideal para quem já utiliza a ferramenta e quer levar seus projetos a um novo nível.',
                'image' => 'event-day-2.png',
            ],
        ]);
    }
}
