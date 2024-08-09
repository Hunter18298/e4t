<?php

namespace App\Http\Controllers;

use App\Models\AcceptForm;
use App\Models\ContentType;
use App\Models\Certificates;
use App\Models\SocialUse;
use App\Models\ColorStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceptFormController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'userData' => 'required|json',
            'paid' => 'required|boolean',
            'contentId' => 'required|integer',
            'certificateId' => 'required|integer',
            'socialId' => 'required|integer',
            'colorId' => 'required|integer',
        ]);

        DB::transaction(function () use ($validated) {
            $acceptFrom = AcceptForm::create($validated);

            return response()->json($acceptFrom, 201);
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
            'colorId' => 'sometimes|integer',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $acceptFrom = AcceptForm::findOrFail($id);
            $acceptFrom->update($validated);

            return response()->json($acceptFrom, 200);
        });
    }

    public function show($id)
    {
        $acceptFrom = AcceptForm::with(['contentType', 'socialUse', 'certificates', 'colorStatus'])->find($id);

        if (!$acceptFrom) {
            return response()->json(['error' => 'Accept From record not found'], 404);
        }

        return response()->json($acceptFrom, 200);
    }

    public function index()
    {
        $acceptFroms = AcceptForm::with(['contentType', 'socialUse', 'certificates', 'colorStatus'])->get();

        return response()->json($acceptFroms, 200);
    }

    public function destroy($id)
    {
        $acceptFrom = AcceptForm::find($id);

        if (!$acceptFrom) {
            return response()->json(['error' => 'Accept From not found'], 404);
        }

        $acceptFrom->delete();

        return response()->json(null, 204);
    }
}
