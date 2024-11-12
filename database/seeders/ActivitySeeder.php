<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;


class ActivitySeeder extends Seeder
{
  public function run(): void
  {
    $activities = [
      [
        'id' => 1,
        'description' => 'ATIVIDADES DE ENSINO',
        'workload_max' => 40,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 2,
        'description' => 'ATIVIDADES DE PESQUISA APLICADA',
        'workload_max' => 18,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 3,
        'description' => 'ATIVIDADES DE EXTENSÃO',
        'workload_max' => 18,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 4,
        'description' => 'ATIVIDADES DE GESTÃO',
        'workload_max' => 18,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 5,
        'description' => 'ATIVIDADES EM COMISSÕES OU DE FISCALIZAÇÃO',
        'workload_max' => 18,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
    ];

    foreach ($activities as $activity) {
      Activity::create($activity);
    }
  }
}
