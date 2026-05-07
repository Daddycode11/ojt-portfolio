<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function ojt()
    {
        return view('ojt');
    }

    public function skills()
    {
        return view('skills');
    }

    public function projects()
    {
        return view('projects');
    }

    public function gallery()
    {
        $photos = [
            ['id' => 1,  'title' => 'First Day Orientation',       'caption' => 'My first day at the company — orientation and workspace setup.',        'category' => 'Milestones', 'date' => 'January 6, 2025',   'icon' => 'fa-door-open',             'color' => 'from-brand-600/40 to-brand-500/20',    'size' => 'tall'],
            ['id' => 2,  'title' => 'Workstation Setup',           'caption' => 'My workstation where I spent most of my OJT hours.',                   'category' => 'Workplace',  'date' => 'January 7, 2025',   'icon' => 'fa-desktop',               'color' => 'from-cyan-600/40 to-cyan-500/20',      'size' => 'normal'],
            ['id' => 3,  'title' => 'Team Stand-up Meeting',       'caption' => 'Daily stand-up with the development team.',                             'category' => 'Team',       'date' => 'January 15, 2025',  'icon' => 'fa-users',                 'color' => 'from-purple-600/40 to-purple-500/20',  'size' => 'normal'],
            ['id' => 4,  'title' => 'Coding Session',              'caption' => 'Deep work session building the Student Information System.',            'category' => 'Projects',   'date' => 'January 22, 2025',  'icon' => 'fa-code',                  'color' => 'from-green-600/40 to-green-500/20',    'size' => 'tall'],
            ['id' => 5,  'title' => 'Database Design Workshop',    'caption' => 'Whiteboard session planning the database schema.',                      'category' => 'Events',     'date' => 'February 3, 2025',  'icon' => 'fa-database',              'color' => 'from-orange-600/40 to-orange-500/20',  'size' => 'normal'],
            ['id' => 6,  'title' => 'With the IT Department',      'caption' => 'Group photo with the amazing IT department team.',                      'category' => 'Team',       'date' => 'February 14, 2025', 'icon' => 'fa-people-group',          'color' => 'from-pink-600/40 to-pink-500/20',      'size' => 'normal'],
            ['id' => 7,  'title' => 'Project Presentation',        'caption' => 'Presenting the Inventory System to stakeholders.',                      'category' => 'Milestones', 'date' => 'February 28, 2025', 'icon' => 'fa-presentation-screen',   'color' => 'from-yellow-600/40 to-yellow-500/20',  'size' => 'tall'],
            ['id' => 8,  'title' => 'Company Tour',                'caption' => 'Touring the company facilities on orientation week.',                   'category' => 'Workplace',  'date' => 'January 8, 2025',   'icon' => 'fa-building',              'color' => 'from-teal-600/40 to-teal-500/20',      'size' => 'normal'],
            ['id' => 9,  'title' => 'Code Review Session',         'caption' => 'Getting feedback on my Laravel code from the senior developer.',        'category' => 'Projects',   'date' => 'March 5, 2025',     'icon' => 'fa-magnifying-glass-chart','color' => 'from-violet-600/40 to-violet-500/20',  'size' => 'normal'],
            ['id' => 10, 'title' => 'OJT Certificate Day',         'caption' => 'The day I received my OJT completion certificate.',                     'category' => 'Milestones', 'date' => 'March 28, 2025',    'icon' => 'fa-certificate',           'color' => 'from-brand-600/40 to-brand-500/20',    'size' => 'tall'],
            ['id' => 11, 'title' => 'Team Lunch Break',            'caption' => 'Lunch with the whole IT team — great bonding moments.',                 'category' => 'Team',       'date' => 'February 21, 2025', 'icon' => 'fa-utensils',              'color' => 'from-rose-600/40 to-rose-500/20',      'size' => 'normal'],
            ['id' => 12, 'title' => 'Deployment Day',              'caption' => 'Deploying the Student Information System to the production server.',    'category' => 'Projects',   'date' => 'March 14, 2025',    'icon' => 'fa-rocket',                'color' => 'from-indigo-600/40 to-indigo-500/20',  'size' => 'normal'],
        ];

        return view('gallery', compact('photos'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10|max:2000',
            'type'    => 'nullable|string|in:job,collaboration,freelance,feedback,other',
        ]);

        // Log the message (for now — add Mailable or SMTP config to actually send email)
        \Log::info('Portfolio Contact Form', $validated);

        // To send a real email, configure MAIL_* in .env and use:
        // Mail::to('your.email@gmail.com')->send(new ContactMail($validated));

        return redirect()->route('contact')
            ->with('success', 'Thank you, ' . $validated['name'] . '! Your message has been received. I\'ll get back to you within 24 hours.');
    }

    // ── Chapters ──────────────────────────────────────────────────────────

    public function acknowledgement()
    {
        return view('chapters.acknowledgement');
    }

    public function toc()
    {
        return view('chapters.toc');
    }

    public function prayer()
    {
        return view('chapters.prayer');
    }

    public function philosophy()
    {
        return view('chapters.philosophy');
    }

    public function careerPlan()
    {
        return view('chapters.career');
    }

    public function chapterOne()   { return view('chapters.chapter', ['number' => 'I',   'title' => 'Chapter I',   'subtitle' => 'Introduction']); }
    public function chapterTwo()   { return view('chapters.chapter', ['number' => 'II',  'title' => 'Chapter II',  'subtitle' => 'Company Profile']); }
    public function chapterThree() { return view('chapters.chapter', ['number' => 'III', 'title' => 'Chapter III', 'subtitle' => 'Work Experiences']); }
    public function chapterFour()  { return view('chapters.chapter', ['number' => 'IV',  'title' => 'Chapter IV',  'subtitle' => 'Assessment of the Practicum Program']); }

    // ── Appendices ────────────────────────────────────────────────────────

    public function appendix(string $letter)
    {
        return view('chapters.appendix', compact('letter'));
    }
}
