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

  public function store(Request $request) {}

  public function update(Request $request, Unit $unit) {}

  public function destroy(Unit $unit) {}
}
