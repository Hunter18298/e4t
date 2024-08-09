<?php

namespace App\Http\Controllers;

use App\Models\MeetingForm;
use App\Models\ContentTypes;
use App\Models\Certificates;
use App\Models\SocialUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MeetingController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'userData' => 'required|json',
            'paid' => 'required|boolean',
            'contentId' => 'required|integer',
            'certificateId' => 'required|integer',
            'socialId' => 'required|integer',
        ]);

        DB::transaction(function () use ($validated) {
            $meeting = MeetingForm::create($validated);

            return response()->json($meeting, 201);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'userData' => 'sometimes|json',
            'paid' => 'sometimes|boolean',
            'contentId' => 'sometimes|integer',
            'certificateId' => 'sometimes|integer',
            'socialId' => 'sometimes|integer',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $meeting = MeetingForm::findOrFail($id);
            $meeting->update($validated);

            return response()->json($meeting, 200);
        });
    }

    public function show($id)
    {
        $meeting = MeetingForm::with(['contentType', 'socialUse', 'certificates'])->find($id);

        if (!$meeting) {
            return response()->json(['error' => 'Meeting record not found'], 404);
        }

        return response()->json($meeting, 200);
    }

    public function index()
    {
        $meetings = MeetingForm::with(['contentType', 'socialUse', 'certificates'])->get();

        return response()->json($meetings, 200);
    }

    public function destroy($id)
    {
        $meeting = MeetingForm::find($id);

        if (!$meeting) {
            return response()->json(['error' => 'Meeting not found'], 404);
        }

        $meeting->delete();

        return response()->json(null, 204);
    }
}

