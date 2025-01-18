<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DonationRequestController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FolderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GetInTouchController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MemberGalleryController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectFollowUpController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SummernoteController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use Illuminate\Support\Facades\Route;


//Private Routes
Route::middleware(['preventBackHistory', 'admin'])->group(function () {

    //project
    Route::group(['prefix' => 'project'], function () {
        Route::get('/index', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/{project_id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::get('/delete/{project_id}', [ProjectController::class, 'delete'])->name('admin.project.delete');
        Route::put('/{project_id}/update', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::put('/update-status', [ProjectController::class, 'updateStatus'])->name('admin.project.update.status');
        Route::post('/ckeditor-upload-image', [ProjectController::class, 'uploadCkeditorImage'])->name('admin.project.ckeditor.uploadImage');
    });

    //event
    Route::group(['prefix' => 'event'], function () {
        Route::get('/index', [EventController::class, 'index'])->name('admin.event.index');
        Route::get('/create', [EventController::class, 'create'])->name('admin.event.create');
        Route::post('/store', [EventController::class, 'store'])->name('admin.event.store');
        Route::get('/{event_id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
        Route::get('/delete/{event_id}', [EventController::class, 'delete'])->name('admin.event.delete');
        Route::put('/{event_id}/update', [EventController::class, 'update'])->name('admin.event.update');
        Route::put('/update-status', [EventController::class, 'updateStatus'])->name('admin.event.update.status');
        Route::post('/ckeditor-upload-image', [EventController::class, 'uploadCkeditorImage'])->name('admin.event.ckeditor.uploadImage');
    });

    //member
    Route::group(['prefix' => 'member'], function () {
        Route::get('/index', [MemberController::class, 'index'])->name('admin.member.index');
        Route::get('/create', [MemberController::class, 'create'])->name('admin.member.create');
        Route::post('/store', [MemberController::class, 'store'])->name('admin.member.store');
        Route::get('/{member_id}/edit', [MemberController::class, 'edit'])->name('admin.member.edit');
        Route::get('/delete/{member_id}', [MemberController::class, 'delete'])->name('admin.member.delete');
        Route::put('/{member_id}/update', [MemberController::class, 'update'])->name('admin.member.update');
        Route::put('/update-status', [MemberController::class, 'updateStatus'])->name('admin.member.update.status');
    });

    //Member Gallery
    // Route::group(['prefix' => 'member-gallery'], function () {
    //     Route::get('/index', [MemberGalleryController::class, 'index'])->name('admin.memberGallery.index');
    //     Route::get('/create', [MemberGalleryController::class, 'create'])->name('admin.memberGallery.create');
    //     Route::post('/store', [MemberGalleryController::class, 'store'])->name('admin.memberGallery.store');
    //     Route::get('/{id}/edit', [MemberGalleryController::class, 'edit'])->name('admin.memberGallery.edit');
    //     Route::get('/delete/{id}', [MemberGalleryController::class, 'delete'])->name('admin.memberGallery.delete');
    //     Route::put('/{id}/update', [MemberGalleryController::class, 'update'])->name('admin.memberGallery.update');
    //     Route::put('/update-status', [MemberGalleryController::class, 'updateStatus'])->name('admin.memberGallery.update.status');
    // });

    //Programs
    Route::group(['prefix' => 'programs'], function () {
        Route::get('/index', [ProgramsController::class, 'index'])->name('admin.programs.index');
        Route::get('/create', [ProgramsController::class, 'create'])->name('admin.programs.create');
        Route::post('/store', [ProgramsController::class, 'store'])->name('admin.programs.store');
        Route::get('/{programs_id}/edit', [ProgramsController::class, 'edit'])->name('admin.programs.edit');
        Route::get('/delete/{programs_id}', [ProgramsController::class, 'delete'])->name('admin.programs.delete');
        Route::put('/{programs_id}/update', [ProgramsController::class, 'update'])->name('admin.programs.update');
        Route::put('/update-status', [ProgramsController::class, 'updateStatus'])->name('admin.programs.update.status');
    });

    //blog category
    Route::group(['prefix' => 'blog-category'], function () {
        Route::get('/index', [BlogCategoryController::class, 'index'])->name('admin.blog.category.index');
        Route::get('/create', [BlogCategoryController::class, 'create'])->name('admin.blog.category.create');
        Route::post('/store', [BlogCategoryController::class, 'store'])->name('admin.blog.category.store');
        Route::get('/{blog_category_id}/edit', [BlogCategoryController::class, 'edit'])->name('admin.blog.category.edit');
        Route::get('/delete/{blog_category_id}', [BlogCategoryController::class, 'delete'])->name('admin.blog.category.delete');
        Route::put('/{blog_category_id}/update', [BlogCategoryController::class, 'update'])->name('admin.blog.category.update');
        Route::put('/update-status', [BlogCategoryController::class, 'updateStatus'])->name('admin.blog.category.update.status');
    });

    //Blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/index', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/{blog_id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::get('/delete/{blog_id}', [BlogController::class, 'delete'])->name('admin.blog.delete');
        Route::put('/{blog_id}/update', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::put('/update-status', [BlogController::class, 'updateStatus'])->name('admin.blog.update.status');
        Route::put('/update-blog-type', [BlogController::class, 'updateBlogType'])->name('admin.blog.type.update');
        Route::post('/ckeditor-upload-image', [BlogController::class, 'uploadCkeditorImage'])->name('admin.blog.ckeditor.uploadImage');
    });

    //Project Follow-up
    // Route::group(['prefix' => 'project-follow-up'], function () {
    //     Route::get('/index', [ProjectFollowUpController::class, 'index'])->name('admin.project_follow_up.index');
    //     Route::get('/create', [ProjectFollowUpController::class, 'create'])->name('admin.project_follow_up.create');
    //     Route::post('/store', [ProjectFollowUpController::class, 'store'])->name('admin.project_follow_up.store');
    //     Route::get('/{id}/edit', [ProjectFollowUpController::class, 'edit'])->name('admin.project_follow_up.edit');
    //     Route::get('/delete/{id}', [ProjectFollowUpController::class, 'delete'])->name('admin.project_follow_up.delete');
    //     Route::put('/{id}/update', [ProjectFollowUpController::class, 'update'])->name('admin.project_follow_up.update');
    //     Route::put('/update-status', [ProjectFollowUpController::class, 'updateStatus'])->name('admin.project_follow_up.update.status');
    // });

    //Donation Request
    Route::group(['prefix' => 'donation-request'], function () {
        Route::get('/index', [DonationRequestController::class, 'index'])->name('admin.donation_request.index');
        Route::get('/create', [DonationRequestController::class, 'create'])->name('admin.donation_request.create');
        Route::post('/store', [DonationRequestController::class, 'store'])->name('admin.donation_request.store');
        Route::get('/{id}/edit', [DonationRequestController::class, 'edit'])->name('admin.donation_request.edit');
        Route::get('/{id}/view', [DonationRequestController::class, 'view'])->name('admin.donation_request.view');
        Route::get('/delete/{id}', [DonationRequestController::class, 'delete'])->name('admin.donation_request.delete');
        Route::put('/{id}/update', [DonationRequestController::class, 'update'])->name('admin.donation_request.update');
        Route::put('/update-status', [DonationRequestController::class, 'updateStatus'])->name('admin.donation_request.update.status');
    });

    //Notice
    Route::group(['prefix' => 'notice'], function () {
        Route::get('/index', [NoticeController::class, 'index'])->name('admin.notice.index');
        Route::get('/create', [NoticeController::class, 'create'])->name('admin.notice.create');
        Route::post('/store', [NoticeController::class, 'store'])->name('admin.notice.store');
        Route::get('/{notice_id}/edit', [NoticeController::class, 'edit'])->name('admin.notice.edit');
        Route::get('/delete/{notice_id}', [NoticeController::class, 'delete'])->name('admin.notice.delete');
        Route::put('/{notice_id}/update', [NoticeController::class, 'update'])->name('admin.notice.update');
        Route::put('/update-status', [NoticeController::class, 'updateStatus'])->name('admin.notice.update.status');
    });

    //Slider
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/index', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/{slider_id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::get('/delete/{slider_id}', [SliderController::class, 'delete'])->name('admin.slider.delete');
        Route::put('/{slider_id}/update', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::put('/update-status', [SliderController::class, 'updateStatus'])->name('admin.slider.update.status');
    });

    //Partner
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/index', [PartnerController::class, 'index'])->name('admin.partner.index');
        Route::get('/create', [PartnerController::class, 'create'])->name('admin.partner.create');
        Route::post('/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/{partner_id}/edit', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::get('/delete/{partner_id}', [PartnerController::class, 'delete'])->name('admin.partner.delete');
        Route::put('/{partner_id}/update', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::put('/update-status', [PartnerController::class, 'updateStatus'])->name('admin.partner.update.status');
    });

    //Quote
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/index', [QuoteController::class, 'index'])->name('admin.quotes.index');
        Route::get('/create', [QuoteController::class, 'create'])->name('admin.quotes.create');
        Route::post('/store', [QuoteController::class, 'store'])->name('admin.quotes.store');
        Route::get('/{quotes_id}/edit', [QuoteController::class, 'edit'])->name('admin.quotes.edit');
        Route::get('/delete/{quotes_id}', [QuoteController::class, 'delete'])->name('admin.quotes.delete');
        Route::put('/{quotes_id}/update', [QuoteController::class, 'update'])->name('admin.quotes.update');
        Route::put('/update-status', [QuoteController::class, 'updateStatus'])->name('admin.quotes.update.status');
    });

    //Folder
    // Route::group(['prefix' => 'admin/folder'], function () {
    //     Route::get('/index', [FolderController::class, 'index'])->name('admin.folder.index');
    //     Route::get('/create', [FolderController::class, 'create'])->name('admin.folder.create');
    //     Route::post('/store', [FolderController::class, 'store'])->name('admin.folder.store');
    //     Route::get('/{folder_id}/edit', [FolderController::class, 'edit'])->name('admin.folder.edit');
    //     Route::get('/delete/{folder_id}', [FolderController::class, 'delete'])->name('admin.folder.delete');
    //     Route::put('/{folder_id}/update', [FolderController::class, 'update'])->name('admin.folder.update');
    //     Route::put('/update-status', [FolderController::class, 'updateStatus'])->name('admin.folder.update.status');
    // });

    //Document
    // Route::group(['prefix' => 'admin/document'], function () {
    //     Route::get('/index', [DocumentController::class, 'index'])->name('admin.document.index');
    //     Route::get('/create', [DocumentController::class, 'create'])->name('admin.document.create');
    //     Route::post('/store', [DocumentController::class, 'store'])->name('admin.document.store');
    //     Route::get('/{document_id}/edit', [DocumentController::class, 'edit'])->name('admin.document.edit');
    //     Route::get('/delete/{document_id}', [DocumentController::class, 'delete'])->name('admin.document.delete');
    //     Route::put('/{document_id}/update', [DocumentController::class, 'update'])->name('admin.document.update');
    //     Route::put('/update-status', [DocumentController::class, 'updateStatus'])->name('admin.document.update.status');
    // });

    //Volunteer
    Route::group(['prefix' => 'admin/volunteer'], function () {
        Route::get('/index', [VolunteerController::class, 'index'])->name('admin.volunteer.index');
        Route::get('/create', [VolunteerController::class, 'create'])->name('admin.volunteer.create');
        Route::post('/store', [VolunteerController::class, 'store'])->name('admin.volunteer.store');
        Route::get('/{volunteer_id}/edit', [VolunteerController::class, 'edit'])->name('admin.volunteer.edit');
        Route::get('/delete/{volunteer_id}', [VolunteerController::class, 'delete'])->name('admin.volunteer.delete');
        Route::put('/{volunteer_id}/update', [VolunteerController::class, 'update'])->name('admin.volunteer.update');
        Route::put('/update-status', [VolunteerController::class, 'updateStatus'])->name('admin.volunteer.update.status');
    });

    //project gallery
    Route::group(['prefix' => 'admin/project-gallery'], function () {
        Route::get('/index', [ProjectGalleryController::class, 'index'])->name('admin.project_gallery.index');
        Route::get('/create', [ProjectGalleryController::class, 'create'])->name('admin.project_gallery.create');
        Route::post('/store', [ProjectGalleryController::class, 'store'])->name('admin.project_gallery.store');
        Route::get('/{id}/edit', [ProjectGalleryController::class, 'edit'])->name('admin.project_gallery.edit');
        Route::get('/delete/{id}', [ProjectGalleryController::class, 'delete'])->name('admin.project_gallery.delete');
        Route::put('/{id}/update', [ProjectGalleryController::class, 'update'])->name('admin.project_gallery.update');
        Route::put('/update-status', [ProjectGalleryController::class, 'updateStatus'])->name('admin.project_gallery.update.status');
    });

    //Setting
    Route::group(['prefix' => 'home-setting'], function () {

        //Mission & Vision Setting
        Route::get('/mission-vision', [HomeSettingController::class, 'showMissionVisionForm'])->name('admin.setting.showMissionVisionForm');
        Route::put('/mission-vision/update', [HomeSettingController::class, 'updateMissionVision'])->name('admin.setting.updateMissionVision');

        //Footer Setting
        Route::get('/footer', [HomeSettingController::class, 'showFooterForm'])->name('admin.footerSetting.showFooterForm');
        Route::put('/footer/update', [HomeSettingController::class, 'updateFooter'])->name('admin.footerSetting.updateFooter');
    });

    //About us Setting
    Route::get('setting/about-us', [AboutUsController::class, 'showAboutUsForm'])->name('admin.aboutUsSetting.showAboutUsForm');
    Route::put('setting/about-us/update', [AboutUsController::class, 'updateAboutUs'])->name('admin.aboutUsSetting.updateAboutUs');

    //Contact us Setting
    Route::get('setting/contact-us', [ContactUsController::class, 'showContactUsForm'])->name('admin.contactUsSetting.showContactUsForm');
    Route::put('setting/contact-us/update', [ContactUsController::class, 'updateContactUs'])->name('admin.contactUsSetting.updateContactUs');

    //Get in touch
    Route::post('contact-us/store/get-in-touch', [GetInTouchController::class, 'store'])->name('admin.contactUs.storeGetInTouch');
    Route::get('contact-us/get-in-touch', [GetInTouchController::class, 'index'])->name('admin.contactUs.indexGetInTouch');
    Route::get('contact-us/get-in-touch/view/{id}', [GetInTouchController::class, 'view'])->name('admin.contactUs.viewGetInTouch');
    Route::get('contact-us/get-in-touch/delete/{id}', [GetInTouchController::class, 'delete'])->name('admin.contactUs.deleteGetInTouch');

    //Admin Gallery
    Route::get('admin/photo-gallery', [GalleryController::class, 'index'])->name('admin.photoGallery.index');

    //All Common Summernote Image Upload
    Route::post('/summernote-upload-image', [SummernoteController::class, 'uploadImage'])->name('admin.summernote.uploadImage');
    Route::post('/ckeditor-upload-image', [SummernoteController::class, 'editor_image_upload'])->name('admin.ckeditor.uploadImage');

    //files
    Route::group(['prefix' => 'admin/files'], function () {
        Route::get('/index/{id}', [FileController::class, 'index'])->name('admin.files.index');
    });
});
