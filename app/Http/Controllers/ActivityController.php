<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     schema="Activity",
 *     type="object",
 *     title="Activity",
 *     description="Modelo da atividade",
 *     required={"id", "description", "workload_max"},
 *     @OA\Property(property="id", type="integer", description="ID da atividade"),
 *     @OA\Property(property="description", type="string", description="Descrição da atividade"),
 *     @OA\Property(property="workload_max", type="integer", description="Carga horária máxima"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data de atualização")
 * )
 */

class ActivityController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/activities",
   *     summary="Listar atividades",
   *     description="Retorna todas as atividades",
   *     tags={"Activities"},
   *     @OA\Response(
   *         response=200,
   *         description="Lista de atividades",
   *         @OA\JsonContent(
   *             type="array",
   *             @OA\Items(ref="#/components/schemas/Activity")
   *         )
   *     )
   * )
   */
  public function index(): JsonResponse
  {
    $activities = Activity::all();
    return response()->json($activities, 200);
  }

  /**
   * @OA\Post(
   *     path="/api/activities",
   *     summary="Create a new activity",
   *     tags={"Activities"},
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             required={"description", "workload_max"},
   *             @OA\Property(property="description", type="string"),
   *             @OA\Property(property="workload_max", type="integer")
   *         )
   *     ),
   *     @OA\Response(
   *         response=201,
   *         description="Activity created",
   *         @OA\JsonContent(ref="#/components/schemas/Activity")
   *     )
   * )
   */
  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'description' => 'required|string|max:255',
      'workload_max' => 'required|integer|min:1',
    ]);

    $activity = Activity::create($request->all());
    return response()->json($activity, 201);
  }

  /**
   * @OA\Get(
   *     path="/api/activities/{activity}",
   *     summary="Retrieve a specific activity",
   *     tags={"Activities"},
   *     @OA\Parameter(
   *         name="activity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Activity details",
   *         @OA\JsonContent(ref="#/components/schemas/Activity")
   *     )
   * )
   */
  public function show(Activity $activity): JsonResponse
  {
    return response()->json($activity, 200);
  }

  /**
   * @OA\Put(
   *     path="/api/activities/{activity}",
   *     summary="Update an activity",
   *     tags={"Activities"},
   *     @OA\Parameter(
   *         name="activity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="description", type="string"),
   *             @OA\Property(property="workload_max", type="integer")
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Activity updated",
   *         @OA\JsonContent(ref="#/components/schemas/Activity")
   *     )
   * )
   */
  public function update(Request $request, Activity $activity): JsonResponse
  {
    $request->validate([
      'description' => 'string|max:255',
      'workload_max' => 'integer|min:1',
    ]);

    $activity->update($request->all());
    return response()->json($activity, 200);
  }

  /**
   * @OA\Delete(
   *     path="/api/activities/{activity}",
   *     summary="Delete an activity",
   *     tags={"Activities"},
   *     @OA\Parameter(
   *         name="activity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Activity deleted",
   *         @OA\JsonContent(
   *             @OA\Property(property="message", type="string")
   *         )
   *     )
   * )
   */
  public function destroy(Activity $activity): JsonResponse
  {
    $activity->delete();
    return response()->json(['message' => 'Activity deleted successfully'], 200);
  }
}
