<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

//Auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('frontend.showLoginForm');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('frontend.showRegisterForm');
Route::get('reset-password', [AuthController::class, 'showResetPasswordForm'])->name('frontend.showResetPasswordForm');
Route::get('change-password', [AuthController::class, 'showChangePasswordForm'])->name('frontend.showChangePasswordForm');


//web pages routes
Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('frontend.aboutUs');
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('frontend.contactUs');

//Project
Route::get('project', [FrontendController::class, 'project'])->name('frontend.project');
Route::get('project-details', [FrontendController::class, 'projectDetails'])->name('frontend.projectDetails');

//Project donation request store route
Route::post('project-donation-request', [FrontendController::class, 'projectDonationRequestStore'])->name('frontend.projectDonationRequestStore');

Route::get('project-follow-up-details/{project_id}', [FrontendController::class, 'projectFollowUpDetails'])->name('frontend.projectFollowUpDetails');

//Event
Route::get('events', [FrontendController::class, 'events'])->name('frontend.events');
Route::get('event-details', [FrontendController::class, 'eventDetails'])->name('frontend.eventDetails');

//Blog
Route::get('blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('blog-details/{blog_id}', [FrontendController::class, 'blogDetails'])->name('frontend.blogDetails');

//Gallery
Route::get('gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');

//about us routes

Route::get('chairman-message', [FrontendController::class, 'chairmanMessage'])->name('frontend.chairmanMessage');
Route::get('executive-committee', [FrontendController::class, 'executiveCommittee'])->name('frontend.executiveCommittee');
Route::get('our-members', [FrontendController::class, 'ourMembers'])->name('frontend.ourMembers');
Route::get('member-details/{member}', [FrontendController::class, 'memberDetails'])->name('frontend.memberDetails');

Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('frontend.privacyPolicy');
Route::get('resolution', [FrontendController::class, 'resolution'])->name('frontend.resolution');
Route::get('faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('disclaimer', [FrontendController::class, 'disclaimer'])->name('frontend.disclaimer');
Route::get('what-makes-us-apart', [FrontendController::class, 'whatMakesUsApart'])->name('frontend.whatMakesUsApart');
Route::get('how-we-spend-your-money', [FrontendController::class, 'howWeSpendMony'])->name('frontend.howWeSpendMony');

//programs
Route::get('all-programs', [FrontendController::class, 'program'])->name('frontend.program');
Route::get('program-details', [FrontendController::class, 'programDetails'])->name('frontend.programDetails');
Route::get('how-we-help', [FrontendController::class, 'howWeHelp'])->name('frontend.howWeHelp');
Route::get('become-volunteer', [FrontendController::class, 'becomeVolunteer'])->name('frontend.becomeVolunteer');
Route::get('send-us-donation', [FrontendController::class, 'sendUsDonation'])->name('frontend.sendUsDonation');
Route::get('inspire-and-help', [FrontendController::class, 'inspireAndHelp'])->name('frontend.inspireAndHelp');

