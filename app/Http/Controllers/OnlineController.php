<?php

namespace App\Http\Controllers;

use App\Models\OnlineForm;
use App\Models\ContentType;
use App\Models\Certificates;
use App\Models\SocialUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineController extends Controller
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
            $online = OnlineForm::create($validated);

            return response()->json($online, 201);
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
            $online = OnlineForm::findOrFail($id);
            $online->update($validated);

            return response()->json($online, 200);
        });
    }

    public function show($id)
    {
        $online = OnlineForm::with(['contentType', 'socialUse', 'certificates'])->find($id);

        if (!$online) {
            return response()->json(['error' => 'OnlineForm record not found'], 404);
        }

        return response()->json($online, 200);
    }

    public function index()
    {
        $onlines = OnlineForm::with(['contentType', 'socialUse', 'certificates'])->get();

        return response()->json($onlines, 200);
    }

    public function destroy($id)
    {
        $online = OnlineForm::find($id);

        if (!$online) {
            return response()->json(['error' => 'OnlineForm not found'], 404);
        }

        $online->delete();

        return response()->json(null, 204);
    }
}
