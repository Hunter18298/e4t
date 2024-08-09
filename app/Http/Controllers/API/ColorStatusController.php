<?php

namespace App\Http\Controllers;

use App\Models\ColorStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorStatusController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        DB::transaction(function () use ($validated) {
            $colorStatus = ColorStatus::create($validated);

            return response()->json($colorStatus, 201);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $colorStatus = ColorStatus::findOrFail($id);
            $colorStatus->update($validated);

            return response()->json($colorStatus, 200);
        });
    }

    public function show($id)
    {
        $colorStatus = ColorStatus::find($id);

        if (!$colorStatus) {
            return response()->json(['error' => 'ColorStatus record not found'], 404);
        }

        return response()->json($colorStatus, 200);
    }

    public function index()
    {
        $colorStatuses = ColorStatus::all();

        return response()->json($colorStatuses, 200);
    }

    public function destroy($id)
    {
        $colorStatus = ColorStatus::find($id);

        if (!$colorStatus) {
            return response()->json(['error' => 'ColorStatus not found'], 404);
        }

        $colorStatus->delete();

        return response()->json(null, 204);
    }
}
