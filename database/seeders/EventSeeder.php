<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()->create([
            'name' => 'Filacon',
            'slug' => 'filacon',
            'title' => 'Dois dias de imersão no universo Filament PHP',
            'description' => 'Aprenda com especialistas, conheça novos recursos, troque experiências e leve seu conhecimento em Laravel e Filament para o próximo nível.',
            'status' => 'active',
            'location' => 'Centro de Convenções, São Paulo, SP',
            'background_image' => 'filacon-bg.png',
        ]);
    }
}
