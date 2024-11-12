<?php

namespace Database\Seeders;

use App\Models\SubActivity;
use Illuminate\Database\Seeder;

class SubActivitySeeder extends Seeder
{
  public function run(): void
  {
    $sub_activities = [
      [
        'id' => 1,
        'activity_id' => 1,
        'description' => 'AULAS EM FIC, TÉCNICO, ESPECIALIZAÇÃO TÉCNICA, GRADUAÇÃO E PÓS-GRADUAÇÃO',
        'workload' => null,
        'workload_max' => 20,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 2,
        'activity_id' => 1,
        'description' => 'ATIVIDADES DE MANUTENÇÃO AO ENSINO',
        'workload' => null,
        'workload_max' => 18,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 3,
        'activity_id' => 1,
        'description' => 'ATIVIDADES DE APOIO AO ENSINO',
        'workload' => null,
        'workload_max' => 2,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 4,
        'activity_id' => 1,
        'description' => 'ATIVIDADES DE ORIENTAÇÃO',
        'workload' => null,
        'workload_max' => 10,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 5,
        'activity_id' => 1,
        'description' => 'ATIVIDADES DE ENSINO EXTRACURRICULAR',
        'workload' => null,
        'workload_max' => 10,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 6,
        'activity_id' => 2,
        'description' => 'ATIVIDADES DE PESQUISA APLICADA',
        'workload' => null,
        'workload_max' => null,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 7,
        'activity_id' => 3,
        'description' => 'ATIVIDADES DE EXTENSÃO',
        'workload' => null,
        'workload_max' => null,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 8,
        'activity_id' => 4,
        'description' => 'ATIVIDADES DE GESTÃO INSTITUCIONAL E ACADÊMICA',
        'workload' => null,
        'workload_max' => null,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
      [
        'id' => 9,
        'activity_id' => 5,
        'description' => 'ATIVIDADES EM COMISSÕES OU DE FISCALIZAÇÃO',
        'workload' => null,
        'workload_max' => null,
        'created_at' => '2024-11-08 00:00:00.000',
        'updated_at' => null,
      ],
    ];

    foreach ($sub_activities as $sub_activity) {
      SubActivity::create($sub_activity);
    }
  }
}
