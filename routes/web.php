<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/',          [PortfolioController::class, 'home'])->name('home');
Route::get('/about',     [PortfolioController::class, 'about'])->name('about');
Route::get('/ojt',       [PortfolioController::class, 'ojt'])->name('ojt');
Route::get('/skills',    [PortfolioController::class, 'skills'])->name('skills');
Route::get('/projects',  [PortfolioController::class, 'projects'])->name('projects');
Route::get('/gallery',   [PortfolioController::class, 'gallery'])->name('gallery');
Route::get('/contact',   [PortfolioController::class, 'contact'])->name('contact');
Route::post('/contact',  [PortfolioController::class, 'sendContact'])->name('contact.send');

// Front-matter pages (Home dropdown)
Route::prefix('chapters')->name('chapter.')->group(function () {
    Route::get('/acknowledgement',        [PortfolioController::class, 'acknowledgement'])->name('acknowledgement');
    Route::get('/table-of-contents',      [PortfolioController::class, 'toc'])->name('toc');
    Route::get('/student-trainee-prayer', [PortfolioController::class, 'prayer'])->name('prayer');
    Route::get('/personal-philosophy',    [PortfolioController::class, 'philosophy'])->name('philosophy');
    Route::get('/career-plan',            [PortfolioController::class, 'careerPlan'])->name('career');
    // Chapter I–IV
    Route::get('/chapter-1', [PortfolioController::class, 'chapterOne'])->name('one');
    Route::get('/chapter-2', [PortfolioController::class, 'chapterTwo'])->name('two');
    Route::get('/chapter-3', [PortfolioController::class, 'chapterThree'])->name('three');
    Route::get('/chapter-4', [PortfolioController::class, 'chapterFour'])->name('four');
});

// Appendices
Route::get('/appendices/{letter}', [PortfolioController::class, 'appendix'])
    ->name('appendix')
    ->where('letter', '[A-R]');
