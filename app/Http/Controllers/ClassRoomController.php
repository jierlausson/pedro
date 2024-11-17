<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 *     schema="ClassRoom",
 *     type="object",
 *     title="ClassRoom",
 *     description="Modelo da sala de aula",
 *     required={"id"},
 *     @OA\Property(property="id", type="integer", description="ID da sala de aula"),
 *     @OA\Property(property="sub_activity_id", type="integer", nullable=true, description="ID da subatividade associada"),
 *     @OA\Property(property="unit_id", type="integer", nullable=true, description="ID da unidade associada"),
 *     @OA\Property(property="description", type="string", nullable=true, description="Descrição da sala de aula"),
 *     @OA\Property(property="weight", type="integer", nullable=true, description="Peso da sala de aula"),
 *     @OA\Property(property="max", type="integer", nullable=true, description="Valor máximo da sala"),
 *     @OA\Property(property="class", type="string", nullable=true, description="Classe"),
 *     @OA\Property(property="class_time", type="integer", nullable=true, description="Tempo de aula"),
 *     @OA\Property(property="day_month_year", type="string", format="date", nullable=true, description="Data associada"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data de atualização")
 * )
 */

class ClassRoomController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/class-rooms",
   *     summary="List all classrooms",
   *     tags={"ClassRooms"},
   *     @OA\Response(
   *         response=200,
   *         description="List of classrooms",
   *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ClassRoom"))
   *     )
   * )
   */
  public function index(): JsonResponse
  {
    $classRooms = ClassRoom::all();
    return response()->json($classRooms, 200);
  }

  /**
   * @OA\Post(
   *     path="/api/class-rooms",
   *     summary="Create a new classroom",
   *     tags={"ClassRooms"},
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="sub_activity_id", type="integer", nullable=true),
   *             @OA\Property(property="unit_id", type="integer", nullable=true),
   *             @OA\Property(property="description", type="string", nullable=true),
   *             @OA\Property(property="weight", type="integer", nullable=true),
   *             @OA\Property(property="max", type="integer", nullable=true),
   *             @OA\Property(property="class", type="string", nullable=true),
   *             @OA\Property(property="class_time", type="integer", nullable=true),
   *             @OA\Property(property="day_month_year", type="string", format="date", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=201,
   *         description="Classroom created",
   *         @OA\JsonContent(ref="#/components/schemas/ClassRoom")
   *     )
   * )
   */
  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'sub_activity_id' => 'nullable|integer',
      'unit_id' => 'nullable|integer',
      'description' => 'nullable|string|max:255',
      'weight' => 'nullable|integer',
      'max' => 'nullable|integer',
      'class' => 'nullable|string|max:255',
      'class_time' => 'nullable|integer',
      'day_month_year' => 'nullable|date',
    ]);

    $classRoom = ClassRoom::create($request->all());
    return response()->json($classRoom, 201);
  }

  /**
   * @OA\Get(
   *     path="/api/class-rooms/{classRoom}",
   *     summary="Retrieve a specific classroom",
   *     tags={"ClassRooms"},
   *     @OA\Parameter(
   *         name="classRoom",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Classroom details",
   *         @OA\JsonContent(ref="#/components/schemas/ClassRoom")
   *     )
   * )
   */
  public function show(ClassRoom $classRoom): JsonResponse
  {
    return response()->json($classRoom, 200);
  }

  /**
   * @OA\Put(
   *     path="/api/class-rooms/{classRoom}",
   *     summary="Update a classroom",
   *     tags={"ClassRooms"},
   *     @OA\Parameter(
   *         name="classRoom",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="sub_activity_id", type="integer", nullable=true),
   *             @OA\Property(property="unit_id", type="integer", nullable=true),
   *             @OA\Property(property="description", type="string", nullable=true),
   *             @OA\Property(property="weight", type="integer", nullable=true),
   *             @OA\Property(property="max", type="integer", nullable=true),
   *             @OA\Property(property="class", type="string", nullable=true),
   *             @OA\Property(property="class_time", type="integer", nullable=true),
   *             @OA\Property(property="day_month_year", type="string", format="date", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Classroom updated",
   *         @OA\JsonContent(ref="#/components/schemas/ClassRoom")
   *     )
   * )
   */
  public function update(Request $request, ClassRoom $classRoom): JsonResponse
  {
    $request->validate([
      'sub_activity_id' => 'nullable|integer',
      'unit_id' => 'nullable|integer',
      'description' => 'nullable|string|max:255',
      'weight' => 'nullable|integer',
      'max' => 'nullable|integer',
      'class' => 'nullable|string|max:255',
      'class_time' => 'nullable|integer',
      'day_month_year' => 'nullable|date',
    ]);

    $classRoom->update($request->all());
    return response()->json($classRoom, 200);
  }

  /**
   * @OA\Delete(
   *     path="/api/class-rooms/{classRoom}",
   *     summary="Delete a classroom",
   *     tags={"ClassRooms"},
   *     @OA\Parameter(
   *         name="classRoom",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Classroom deleted",
   *         @OA\JsonContent(
   *             @OA\Property(property="message", type="string")
   *         )
   *     )
   * )
   */
  public function destroy(ClassRoom $classRoom): JsonResponse
  {
    $classRoom->delete();
    return response()->json(['message' => 'Classroom deleted successfully'], 200);
  }
}
