<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentTypeController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {
            $contentType = ContentType::create($validated);

            return response()->json($contentType, 201);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $contentType = ContentType::findOrFail($id);
            $contentType->update($validated);

            return response()->json($contentType, 200);
        });
    }

    public function show($id)
    {
        $contentType = ContentType::find($id);

        if (!$contentType) {
            return response()->json(['error' => 'ContentType record not found'], 404);
        }

        return response()->json($contentType, 200);
    }

    public function index()
    {
        $contentTypes = ContentType::all();

        return response()->json($contentTypes, 200);
    }

    public function destroy($id)
    {
        $contentType = ContentType::find($id);

        if (!$contentType) {
            return response()->json(['error' => 'ContentType not found'], 404);
        }

        $contentType->delete();

        return response()->json(null, 204);
    }
}
