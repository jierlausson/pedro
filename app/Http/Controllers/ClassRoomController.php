<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClassRoomController extends Controller
{
  public function index(): JsonResponse
  {
    $classRooms = ClassRoom::all();
    return response()->json($classRooms, 200);
  }

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

  public function destroy(ClassRoom $classRoom): JsonResponse
  {
    $classRoom->delete();
    return response()->json(['message' => 'Class room deleted successfully'], 200);
  }
}
