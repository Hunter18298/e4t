<?php

namespace App\Http\Controllers;

use App\Models\SocialUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialUseController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            // Include other fields as needed
        ]);

        DB::transaction(function () use ($validated) {
            $socialUse = SocialUse::create($validated);

            return response()->json($socialUse, 201);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            // Include other fields as needed
        ]);

        DB::transaction(function () use ($id, $validated) {
            $socialUse = SocialUse::findOrFail($id);
            $socialUse->update($validated);

            return response()->json($socialUse, 200);
        });
    }

    public function show($id)
    {
        $socialUse = SocialUse::find($id);

        if (!$socialUse) {
            return response()->json(['error' => 'Social Use record not found'], 404);
        }

        return response()->json($socialUse, 200);
    }

    public function index()
    {
        $socialUses = SocialUse::all();

        return response()->json($socialUses, 200);
    }

    public function destroy($id)
    {
        $socialUse = SocialUse::find($id);

        if (!$socialUse) {
            return response()->json(['error' => 'Social Use not found'], 404);
        }

        $socialUse->delete();

        return response()->json(null, 204);
    }
}
