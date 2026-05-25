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
        // Auto-create/update E-Bikes Rental Platform project in the database dynamically
        $defaultSlug = env('E_BIKES_SLUG', 'ebikes-2026');
        $defaultRepo = env('GITHUB_REPO', null);
        
        $existing = Project::where('title', 'E-Bikes Rental Platform')->first();
        if ($existing) {
            if ($existing->slug !== $defaultSlug) {
                $existing->update(['slug' => $defaultSlug]);
            }
        } else {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'slug'              => $defaultSlug,
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'github_url'        => $defaultRepo,
                'problem_analysis'  => '<p>Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap, dirancang untuk UTS mata kuliah pemrograman web.</p>',
            ]);
        }

        $profile  = Profile::first();
        $projects = Project::orderBy('order')->take(3)->get();
        return view('portfolio.home', compact('profile', 'projects'));
    }

    public function projects()
    {
        $defaultSlug = env('E_BIKES_SLUG', 'ebikes-2026');
        $defaultRepo = env('GITHUB_REPO', null);
        
        $existing = Project::where('title', 'E-Bikes Rental Platform')->first();
        if ($existing) {
            if ($existing->slug !== $defaultSlug) {
                $existing->update(['slug' => $defaultSlug]);
            }
        } else {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'slug'              => $defaultSlug,
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'github_url'        => $defaultRepo,
                'problem_analysis'  => '<p>Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap, dirancang untuk UTS mata kuliah pemrograman web.</p>',
            ]);
        }

        $projects = Project::orderBy('order')->get();
        return view('portfolio.projects', compact('projects'));
    }

    /**
     * Show project detail by slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function projectDetail(string $slug): \Illuminate\Contracts\View\View
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