<?php

namespace App\Http\Controllers;

use App\Models\MeetingForm;
use App\Models\ContentTypes;
use App\Models\Certificates;
use App\Models\SocialUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $query = MeetingForm::query();

        // Apply search filter
        if ($search = $request->input('search')) {
            $query->where('userData->name', 'like', "%{$search}%")
                ->orWhere('userData->phone', 'like', "%{$search}%");
        }

        // Apply content filter
        if ($contentId = $request->input('content')) {
            $query->where('contentId', $contentId);
        }

        // Retrieve all meetings with related models
        $meetings = $query->with(['contentType', 'socialUse', 'certificate'])->get();

        return view('admin.meeting', compact('meetings'));
    }

    public function show($id)
    {
        $meeting = MeetingForm::with(['contentType', 'socialUse', 'certificate'])->findOrFail($id);

        return view('meetings.show', compact('meeting'));
    }

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
            MeetingForm::create($validated);
        });

        return redirect()->route('admin.meeting')->with('success', 'Meeting created successfully.');
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
        });

        return redirect()->route('admin.meeting')->with('success', 'Meeting updated successfully.');
    }

    public function destroy($id)
    {
        $meeting = MeetingForm::findOrFail($id);

        $meeting->delete();

        return redirect()->route('admin.meeting')->with('success', 'Meeting deleted successfully.');
    }

    public function markPaid(Request $request)
    {
        $validated = $request->validate([
            'meeting_id' => 'required|integer|exists:meeting_forms,id',
            'paidAmount' => 'required|numeric',
            'groupId' => 'required|integer|exists:course_groups,id',
            'colorStatusId' => 'required|integer|exists:color_statuses,id',
        ]);

        DB::transaction(function () use ($validated) {
            $meeting = MeetingForm::findOrFail($validated['meeting_id']);
            $meeting->update([
                'paid' => true,
                'paidAmount' => $validated['paidAmount'],
                'groupId' => $validated['groupId'],
                'colorStatusId' => $validated['colorStatusId'],
            ]);
        });

        return redirect()->route('admin.meeting')->with('success', 'Meeting marked as paid successfully.');
    }
}
