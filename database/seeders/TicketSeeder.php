<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()->createMany([
            [
                'name' => 'Comunidade & Estudante',
                'description' => 'Desconto especial para estudantes e membros ativos da comunidade.',
                'price' => 70,
                'stock' => 100,
                'benefits' => [
                    'Acesso aos dois dias do evento',
                    'Kit do participante',
                    'Certificado de participação',
                    'Coffee break',
                ],
                'sort' => 1,
                'vip' => false,
                'active' => true,
                'event_id' => 1,
            ],
            [
                'name' => 'Ingresso Padrão',
                'description' => 'Ingresso integral sem descontos, com acesso a todo o conteúdo do evento.',
                'price' => 140,
                'stock' => 100,
                'benefits' => [
                    'Acesso aos dois dias do evento',
                    'Kit do participante',
                    'Certificado de participação',
                    'Coffee break',
                ],
                'sort' => 2,
                'vip' => false,
                'active' => true,
                'event_id' => 1,
            ],
            [
                'name' => 'Ingresso VIP',
                'description' => 'Para quem quer uma experiência premium durante todo o evento.',
                'price' => 200,
                'stock' => 100,
                'benefits' => [
                    'Tudo do Ingresso Padrão',
                    'Assento reservado nas primeiras fileiras',
                    'Camiseta oficial do evento',
                    'Coffee break exclusivo e brindes extras',
                    'Acesso ao sorteio de licenças',
                    'Crachá Apoiador VIP',
                ],
                'sort' => 3,
                'vip' => true,
                'active' => true,
                'event_id' => 1,
            ],
        ]);
    }
}
