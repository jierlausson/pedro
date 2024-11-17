<?php

namespace App\Http\Controllers;

use App\Models\SubActivity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubActivityController extends Controller
{
  public function index(): JsonResponse
  {
    $subActivities = SubActivity::all();
    return response()->json($subActivities, 200);
  }

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

  public function show(SubActivity $subActivity): JsonResponse
  {
    return response()->json($subActivity, 200);
  }

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

  public function destroy(SubActivity $subActivity): JsonResponse
  {
    $subActivity->delete();
    return response()->json(['message' => 'Sub-activity deleted successfully'], 200);
  }
}
