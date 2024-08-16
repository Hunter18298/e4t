<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcceptForm;
use App\Models\ContentType;

class AdminHomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch or calculate the necessary data
        $acceptForms = AcceptForm::all();
        $totalPaid = $acceptForms->where('paid', true)->sum('paidAmount');
        $totalPaidThisMonth = $acceptForms->where('created_at', '>=', now()->startOfMonth())->where('paid', true)->count();
        $totalParticipants = $acceptForms->count();
        $totalParticipantsThisMonth = $acceptForms->where('created_at', '>=', now()->startOfMonth())->count();

        // For Chart.js
        $months = ['January', 'February', 'March', 'April', 'May', 'June']; // Example, replace with dynamic data
        $coursesPaidData = [12, 19, 3, 5, 2, 3]; // Replace with actual data
        $coursesThisMonthData = [2, 3, 20, 5, 1, 4]; // Replace with actual data

        // Fetch content types
        $contentTypes = ContentType::all(); // Assuming you have a ContentType model

        // Apply filters based on request
        $contentFilter = $request->input('content_filter');
        $search = $request->input('search');
        
        // Filter AcceptForms based on content type and search query
        $filteredForms = $acceptForms->when($contentFilter, function ($query) use ($contentFilter) {
            return $query->where('content_type_id', $contentFilter);
        })->when($search, function ($query) use ($search) {
            return $query->where('userData->name', 'like', "%$search%")
                         ->orWhere('userData->phone', 'like', "%$search%");
        });

        // Pass all data to the view
        return view('admin.home', [
            'totalPaid' => $totalPaid,
            'totalPaidThisMonth' => $totalPaidThisMonth,
            'totalParticipants' => $totalParticipants,
            'totalParticipantsThisMonth' => $totalParticipantsThisMonth,
            'months' => $months,
            'coursesPaidData' => $coursesPaidData,
            'coursesThisMonthData' => $coursesThisMonthData,
            'acceptForms' => $acceptForms,
            'contentTypes' => $contentTypes,
            'filteredForms' => $filteredForms, // Pass the filteredForms variable
        ]);
    }
}
