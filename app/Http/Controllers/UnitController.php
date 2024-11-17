<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Unit",
 *     type="object",
 *     title="Unit",
 *     description="Modelo da unidade",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", description="ID da unidade"),
 *     @OA\Property(property="name", type="string", description="Nome da unidade"),
 *     @OA\Property(property="description", type="string", nullable=true, description="Descrição da unidade"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data de atualização")
 * )
 */

class UnitController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/units",
   *     summary="List all units",
   *     tags={"Units"},
   *     @OA\Response(
   *         response=200,
   *         description="List of units",
   *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Unit"))
   *     )
   * )
   */
  public function index(): JsonResponse
  {
    $units = Unit::all();
    return response()->json($units, 200);
  }

  /**
   * @OA\Post(
   *     path="/api/units",
   *     summary="Create a new unit",
   *     tags={"Units"},
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="name", type="string"),
   *             @OA\Property(property="description", type="string", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=201,
   *         description="Unit created",
   *         @OA\JsonContent(ref="#/components/schemas/Unit")
   *     )
   * )
   */
  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);

    $unit = Unit::create($request->all());
    return response()->json($unit, 201);
  }

  /**
   * @OA\Get(
   *     path="/api/units/{unit}",
   *     summary="Retrieve a specific unit",
   *     tags={"Units"},
   *     @OA\Parameter(
   *         name="unit",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Unit details",
   *         @OA\JsonContent(ref="#/components/schemas/Unit")
   *     )
   * )
   */
  public function show(Unit $unit): JsonResponse
  {
    return response()->json($unit, 200);
  }

  /**
   * @OA\Put(
   *     path="/api/units/{unit}",
   *     summary="Update a unit",
   *     tags={"Units"},
   *     @OA\Parameter(
   *         name="unit",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(property="name", type="string"),
   *             @OA\Property(property="description", type="string", nullable=true)
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Unit updated",
   *         @OA\JsonContent(ref="#/components/schemas/Unit")
   *     )
   * )
   */
  public function update(Request $request, Unit $unit): JsonResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);

    $unit->update($request->all());
    return response()->json($unit, 200);
  }

  /**
   * @OA\Delete(
   *     path="/api/units/{unit}",
   *     summary="Delete a unit",
   *     tags={"Units"},
   *     @OA\Parameter(
   *         name="unit",
   *         in="path",
   *         required=true,
   *         @OA\Schema(type="integer")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Unit deleted",
   *         @OA\JsonContent(
   *             @OA\Property(property="message", type="string")
   *         )
   *     )
   * )
   */
  public function destroy(Unit $unit): JsonResponse
  {
    $unit->delete();
    return response()->json(['message' => 'Unit deleted successfully'], 200);
  }
}
