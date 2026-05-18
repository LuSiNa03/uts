<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        // Auto-create E-Bikes Rental Platform project in the database if it doesn't exist yet
        if (!Project::where('slug', 'e-bikes-rental-platform')->exists()) {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'github_url'        => 'https://github.com/LuSiNa03/ebikes-2026',
                'problem_analysis'  => '<p>Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap, dirancang untuk UTS mata kuliah pemrograman web.</p>',
            ]);
        }

        $profile  = Profile::first();
        $projects = Project::orderBy('order')->take(3)->get();
        return view('portfolio.home', compact('profile', 'projects'));
    }

    public function projects()
    {
        // Auto-create E-Bikes Rental Platform project in the database if it doesn't exist yet
        if (!Project::where('slug', 'e-bikes-rental-platform')->exists()) {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'github_url'        => 'https://github.com/LuSiNa03/ebikes-2026',
                'problem_analysis'  => '<p>Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap, dirancang untuk UTS mata kuliah pemrograman web.</p>',
            ]);
        }

        $projects = Project::orderBy('order')->get();
        return view('portfolio.projects', compact('projects'));
    }

    public function projectDetail($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('portfolio.project-detail', compact('project'));
    }

    public function contact()
    {
        $profile = Profile::first();
        return view('portfolio.contact', compact('profile'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'email', 'subject', 'message'));

        return back()->with('success', 'Pesan berhasil dikirim! Terima kasih.');
    }
}