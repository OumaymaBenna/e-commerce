<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $salesChart = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr'],
            'data' => [5000, 7000, 8000, 6500]
        ];
    
        return view('admin.dashboard.index', compact('salesChart'));
    }
    public function promotions()
    {
        // Logic to fetch promotions, if any, and pass to the view
        return view('admin.promotions');
    }
    public function reports()
    {
        // Add logic to fetch the report data, if needed
        return view('admin.reports');
    }
    public function settings()
    {
        // Add logic to fetch the settings data, if needed
        return view('admin.settings');
    }
}

