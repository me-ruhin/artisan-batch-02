<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role_name;
        switch ($role) {
            case 'admin':
                return redirect('/admin/dashboard');
            case 'instructor':
                return redirect('/instructor/dashboard');
            case 'student':
                return redirect('/student/dashboard');
            default:
                return view('auth.login');
        }
    }
    public function adminDashboard()
    {
        return view('admin_dashboard');
    }
    public function instructorDashboard()
    {
        return view('instructor_dashboard');
    }
    public function studentDashboard()
    {
        return view('student_dashboard');
    }
}
