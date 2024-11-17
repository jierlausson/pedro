<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ActivityController extends Controller
{
  public function index(): JsonResponse
  {
    $activities = Activity::all();
    return response()->json($activities, 200);
  }

  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'description' => 'required|string|max:255',
      'workload_max' => 'required|integer|min:1',
    ]);

    $activity = Activity::create($request->all());
    return response()->json($activity, 201);
  }

  public function show(Activity $activity): JsonResponse
  {
    return response()->json($activity, 200);
  }

  public function update(Request $request, Activity $activity): JsonResponse
  {
    $request->validate([
      'description' => 'string|max:255',
      'workload_max' => 'integer|min:1',
    ]);

    $activity->update($request->all());
    return response()->json($activity, 200);
  }

  public function destroy(Activity $activity): JsonResponse
  {
    $activity->delete();
    return response()->json(['message' => 'Activity deleted successfully'], 200);
  }
}
