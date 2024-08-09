<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
        ]);

        DB::transaction(function () use ($validated) {
            $certificate = Certificate::create($validated);

            return response()->json($certificate, 201);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'issue_date' => 'sometimes|date',
            'expiry_date' => 'sometimes|date',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $certificate = Certificate::findOrFail($id);
            $certificate->update($validated);

            return response()->json($certificate, 200);
        });
    }

    public function show($id)
    {
        $certificate = Certificate::find($id);

        if (!$certificate) {
            return response()->json(['error' => 'Certificate record not found'], 404);
        }

        return response()->json($certificate, 200);
    }

    public function index()
    {
        $certificates = Certificate::all();

        return response()->json($certificates, 200);
    }

    public function destroy($id)
    {
        $certificate = Certificate::find($id);

        if (!$certificate) {
            return response()->json(['error' => 'Certificate not found'], 404);
        }

        $certificate->delete();

        return response()->json(null, 204);
    }
}
