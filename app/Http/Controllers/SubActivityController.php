<?php

namespace App\Http\Controllers;

use App\Models\SubActivity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     schema="SubActivity",
 *     type="object",
 *     title="SubActivity",
 *     description="Modelo da subatividade",
 *     required={"id", "activity_id", "description", "workload_max"},
 *     @OA\Property(property="id", type="integer", description="ID da subatividade"),
 *     @OA\Property(property="activity_id", type="integer", description="ID da atividade associada"),
 *     @OA\Property(property="class_room_id", type="integer", nullable=true, description="ID da sala de aula associada"),
 *     @OA\Property(property="description", type="string", description="Descrição da subatividade"),
 *     @OA\Property(property="workload_max", type="integer", description="Carga horária máxima"),
 *     @OA\Property(property="workload", type="integer", description="Carga horária atual"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data de atualização")
 * )
 */


class SubActivityController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/sub-activities",
   *     summary="List all sub-activities",
   *     tags={"SubActivities"},
   *     @OA\Response(
   *         response=200,
   *         description="List of sub-activities",
   *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SubActivity"))
   *     )
   * )
   */
  public function index(): JsonResponse
  {
    $subActivities = SubActivity::all();
    return response()->json($subActivities, 200);
  }

  /**
   * @OA\Post(
   *     path="/api/sub-activities",
   *     summary="Create a new sub-activity",
   *     tags={"SubActivities"},
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="activity_id", type="integer"),
   *             @OA\Property(property="class_room_id", type="integer", nullable=true),
   *             @OA\Property(property="description", type="string"),
   *             @OA\Property(property="workload_max", type="integer", nullable=true),
   *             @OA\Property(property="workload", type="integer", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=201,
   *         description="Sub-activity created",
   *         @OA\JsonContent(ref="#/components/schemas/SubActivity")
   *     )
   * )
   */
  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'activity_id' => 'required|exists:activities,id',
      'class_room_id' => 'nullable|exists:class_rooms,id',
      'description' => 'required|string|max:255',
      'workload_max' => 'integer|min:1',
      'workload' => 'integer|min:1',
    ]);

    $subActivity = SubActivity::create($request->all());
    return response()->json($subActivity, 201);
  }

  /**
   * @OA\Get(
   *     path="/api/sub-activities/{subActivity}",
   *     summary="Retrieve a specific sub-activity",
   *     tags={"SubActivities"},
   *     @OA\Parameter(
   *         name="subActivity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Sub-activity details",
   *         @OA\JsonContent(ref="#/components/schemas/SubActivity")
   *     )
   * )
   */
  public function show(SubActivity $subActivity): JsonResponse
  {
    return response()->json($subActivity, 200);
  }

  /**
   * @OA\Put(
   *     path="/api/sub-activities/{subActivity}",
   *     summary="Update a sub-activity",
   *     tags={"SubActivities"},
   *     @OA\Parameter(
   *         name="subActivity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="activity_id", type="integer"),
   *             @OA\Property(property="class_room_id", type="integer", nullable=true),
   *             @OA\Property(property="description", type="string"),
   *             @OA\Property(property="workload_max", type="integer", nullable=true),
   *             @OA\Property(property="workload", type="integer", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Sub-activity updated",
   *         @OA\JsonContent(ref="#/components/schemas/SubActivity")
   *     )
   * )
   */
  public function update(Request $request, SubActivity $subActivity): JsonResponse
  {
    $request->validate([
      'activity_id' => 'required|exists:activities,id',
      'class_room_id' => 'nullable|exists:class_rooms,id',
      'description' => 'required|string|max:255',
      'workload_max' => 'integer|min:1',
      'workload' => 'integer|min:1',
    ]);

    $subActivity->update($request->all());
    return response()->json($subActivity, 200);
  }

  /**
   * @OA\Delete(
   *     path="/api/sub-activities/{subActivity}",
   *     summary="Delete a sub-activity",
   *     tags={"SubActivities"},
   *     @OA\Parameter(
   *         name="subActivity",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Sub-activity deleted",
   *         @OA\JsonContent(
   *             @OA\Property(property="message", type="string")
   *         )
   *     )
   * )
   */
  public function destroy(SubActivity $subActivity): JsonResponse
  {
    $subActivity->delete();
    return response()->json(['message' => 'Sub-activity deleted successfully'], 200);
  }
}
