<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;


class UnitSeeder extends Seeder
{
  public function run(): void
  {
    $units = [
      [
        'id' => 0,
        'description' => '-',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 1,
        'description' => 'Área/Setor',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 2,
        'description' => 'Assistência',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 3,
        'description' => 'Assessoria',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 4,
        'description' => 'Bolsa',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 5,
        'description' => 'Contrato',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 6,
        'description' => 'Coordenação',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 7,
        'description' => 'Coordenação de Programa',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 8,
        'description' => 'Coordenações',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 9,
        'description' => 'Créditos',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 10,
        'description' => 'Curso',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 11,
        'description' => 'Departamento',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 12,
        'description' => 'Duração do Curso em horas',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 13,
        'description' => 'Estudantes',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 14,
        'description' => 'Eventos',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 15,
        'description' => 'Horas',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 16,
        'description' => 'Laboratórios',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 17,
        'description' => 'Num. de Campo de Estágio',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 18,
        'description' => 'Participações',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 19,
        'description' => 'Processo',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 20,
        'description' => 'Programa',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 21,
        'description' => 'Programas',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 22,
        'description' => 'Projetos',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 23,
        'description' => 'Setor',
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
    ];

    foreach ($units as $unit) {
      Unit::create($unit);
    }
  }
}
