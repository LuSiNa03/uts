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
        $profile  = Profile::first();
        $projects = Project::orderBy('order')->take(3)->get();
        return view('portfolio.home', compact('profile', 'projects'));
    }

    public function projects()
    {
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