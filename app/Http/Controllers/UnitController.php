<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function index(): JsonResponse
  {
    $units = Unit::all();
    return response()->json($units, 200);
  }

  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);

    $unit = Unit::create($request->all());
    return response()->json($unit, 201);
  }

  public function show(Unit $unit): JsonResponse
  {
    return response()->json($unit, 200);
  }

  public function update(Request $request, Unit $unit): JsonResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);

    $unit->update($request->all());
    return response()->json($unit, 200);
  }

  public function destroy(Unit $unit): JsonResponse
  {
    $unit->delete();
    return response()->json(['message' => 'Unit deleted successfully'], 200);
  }
}
