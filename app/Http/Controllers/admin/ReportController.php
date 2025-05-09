<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        $complaintsByStatus = DB::table('complaints')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $complaintsByEmployee = DB::table('complaints')
            ->join('users', 'complaints.assigned_to', '=', 'users.id')
            ->select('users.name', DB::raw('count(*) as total'))
            ->groupBy('users.name')
            ->get();

        return view('admin.reports', compact('complaintsByStatus', 'complaintsByEmployee'));
    }
}
