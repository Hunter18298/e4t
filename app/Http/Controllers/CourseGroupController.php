<?php

namespace App\Http\Controllers;

use App\Models\CourseGroup;
use App\Models\AcceptFrom;
use App\Models\Certificates;
use App\Models\ColorStatus;
use App\Models\ContentType;
use App\Models\SocialUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseGroupController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            // Include other fields as needed
        ]);

        DB::transaction(function () use ($validated) {
            $courseGroup = CourseGroup::create($validated);

            return response()->json($courseGroup, 201);
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
            $courseGroup = CourseGroup::findOrFail($id);
            $courseGroup->update($validated);

            return response()->json($courseGroup, 200);
        });
    }

    public function show($id)
    {
        $courseGroup = CourseGroup::with([
            'acceptFrom' => function ($query) {
                $query->with(['contentType', 'socialUse', 'certificates', 'colorStatus']);
            }
        ])->find($id);

        if (!$courseGroup) {
            return response()->json(['error' => 'Group record not found'], 404);
        }

        return response()->json($courseGroup, 200);
    }

    public function index()
    {
        $courseGroups = CourseGroup::all();

        return response()->json($courseGroups, 200);
    }

    public function destroy($id)
    {
        $courseGroup = CourseGroup::find($id);

        if (!$courseGroup) {
            return response()->json(['error' => 'Group not found'], 404);
        }

        $courseGroup->delete();

        return response()->json(null, 204);
    }
}
