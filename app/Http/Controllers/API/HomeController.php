<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $isHome = request()->is('/');
        return view('home', ['isHome' => $isHome, 'finishLoading' => true]); // Added 'finishLoading' for splash screen
    }

    public function meeting()
    {
        return view('meeting'); // Ensure you have a 'meeting.blade.php' view
    }

    public function online()
    {
        return view('online'); // Ensure you have an 'online.blade.php' view
    }
}
