<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Pages */

Route::get('/', 'HomeController@index')->name('home');

Route::get('send-mail', [AppointmentController::class, 'mailTest']);

Route::get('subscription/seo/package/{id}', [SubscriptionController::class, 'getSeo'])->name('getSeo');
Route::get('subscription/branding/package/{id}', [SubscriptionController::class, 'getBranding'])->name('getBranding');
Route::get('subscription/social-media/package/{id}', [SubscriptionController::class, 'getSocialMedia'])->name('getSocialMedia');
Route::get('subscription/website/package/{id}', [SubscriptionController::class, 'getwebsite'])->name('getwebsite');
Route::get('subscription/video/package/{id}', [SubscriptionController::class, 'getvideo'])->name('getvideo');

// Route::get('subscription/website/package/{id}',[SubscriptionController::class, 'getWebsiteID'])->name('getwebsiteid');


Route::get('slider', [HomeController::class, 'test'])->name('slider');



//Route::get('/book-a-call', function () {
//    return view('layouts.site.schedule.scheduleFull');
//});

Route::get('book-a-call', 'AppointmentController@getBookingPage')->name('book.a.call');
//Route::post('book-a-call', 'AppointmentController@getRequest')->name('book.a.call');

Route::get('/lets-talk', function () {
    return view('site.pages.lets-talk');
});
Route::post('/lets-talk', 'HomeController@letsTalk')->name('lets-talk');


Route::get('privacy-policy', 'HomeController@privacyPolicy');
Route::get('web-maintenance', 'HomeController@webMaintenance');

/* Contact */
Route::get('contact-us', 'ContactUs\ContactUsController@show');
Route::post('contact-us', 'ContactUs\ContactUsController@store')->name('ContactUs.store');

/* Career */
Route::get('career', 'Career\CareerController@show_all');
Route::get('career/{slug}', 'Career\CareerController@show');

/* case study */
Route::group(['prefix' => 'case-study'], function () {
    Route::get('seo', function () {
        return view('site.pages.case-study.seo');
    });
    Route::get('branding', function () {
        return view('site.pages.case-study.branding');
    });
    Route::get('social-media', function () {
        return view('site.pages.case-study.social-media');
    });
});
Route::get('career/{slug}', 'Career\CareerController@show');

/* Portfolio */
Route::get('portfolio', 'Services\PortfolioController@show_all');
Route::get('portfolio/{slug}', 'Services\PortfolioController@show');

Route::get('portfolio/content/{id}', 'Services\PortfolioController@getContent')->name('portfolio.content');
Route::get('blog/content/{id}', 'Blog\BlogController@getContent')->name('blog.content');
Route::get('web/content/{id}', 'WebMaintenanceController@getContent')->name('web.content');

/* Blog */
Route::get('blog/{id?}', 'Blog\BlogController@show_all');
Route::get('blog/details/{slug}', 'Blog\BlogController@show');

/* Services */
Route::get('services/{slug}', 'Services\ServicesController@show')->name('service.show');

/* Request Services */
Route::get('services-request/{id}/{package}', 'Services\ServiceRequestController@show');
Route::get('services-request', 'Services\ServiceRequestController@showWOParams');
Route::post('services-request', 'Services\ServiceRequestController@store')->name('ServiceRequest.store');

/* Only User Logged In */
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('your-account', 'Profile\ProfileController@youraccount');
    });

    Route::group(['middleware' => ['can:isManager']], function () {
        /* Dashboard Route */
        Route::group(['prefix' => 'admin'], function () {
            /* Dashboard */
            Route::get('/', 'Dashboard\DashboardController@index');

            // Project creation
            Route::get('/new/project', [ProjectController::class, 'newProject'])->name('newproject');
            Route::post('/create/project', [ProjectController::class, 'createProject'])->name('createproject');

            // send email to team
            Route::post('/sendMailtoTeam', [ProjectController::class, 'sendMailToTeam'])->name('sendMailtoTeam');


            // filter users
            Route::get('/users/admins/{admin}', [ProjectController::class, 'filterUser'])->name('adminusers');
            Route::get('/users/customer/{customer}', [ProjectController::class, 'filterUser'])->name('customerusers');

            /* Category */
            Route::resource('categories', 'CategoryController');
            Route::resource('blog-categories', 'BlogCategoryController');
            Route::resource('reviews', 'ReviewController');
            Route::post('category/destroy', 'CategoryController@destroy')->name('categories.destroy');
            Route::post('blog-categories/destroy', 'BlogCategoryController@destroy')->name('blog-categories.destroy');
            Route::post('reviews/destroy', 'ReviewController@destroy')->name('reviews.destroy');

            Route::get('web-maintenance', 'WebMaintenanceController@index')->name('web-maintenance');
            Route::post('web-maintenance', 'WebMaintenanceController@update')->name('web-maintenance.update');

            /* Projects */
            Route::resource('projects', 'Project\ProjectController');
            Route::post('project/destroy', 'Project\ProjectController@destroy')->name('projects.destroy');

            Route::resource('invoices', 'Project\InvoiceController')
                ->except([
                    'show', 'index'
                ]);;
            Route::get('/invoices/create/{project?}', 'Project\InvoiceController@create')->name('invoices.create');
            Route::get('/invoices/{project?}', 'Project\InvoiceController@index')->name('invoices.index');
            Route::post('invoices/destroy', 'Project\InvoiceController@destroy')->name('invoices.destroy');

            Route::get('payments', 'Project\PaymentController@list')->name('payments');

            Route::get('appointments', 'AppointmentController@index')->name('appointments');
            Route::post('appointments/mailSettings', 'AppointmentController@mailSetting')->name('appointment.mailsetting');
            Route::post('appointments/sendMail', 'AppointmentController@sendMail')->name('appointment.sendMail');

            Route::get('project-invoice/{id}', 'Project\InvoiceController@invoice')->name('projects.invoice');
            Route::post('project-invoice/{id}', 'Project\InvoiceController@addPayment')->name('projects.add.payment');
            Route::post('payment-status/{id}', 'Project\InvoiceController@changeStatus')->name('projects.payment.status');


            // Project Message
            Route::get('project-message/{id}', 'Project\ProjectController@message')->name('project.message');
            Route::post('project-message-send', 'Project\ProjectController@messageSend')->name('project.message.send');

            // users
            //Route::get('users', 'UserController@index')->name('users.index');

            // Tickets
            Route::get('tickets/{userID}', [TicketController::class, 'filterTicket'])->name('userticket');
            Route::get('tickets', 'TicketController@index')->name('tickets.index');
            Route::get('ticket-message/{id}', 'TicketController@message')->name('ticket.message');
            Route::post('ticket-message-send', 'TicketController@messageSend')->name('ticket.message.send');


            /* Tasks */
            Route::resource('tasks', 'Project\ProjectTaskController')
                ->except([
                    'show', 'index'
                ]);
            Route::get('/tasks/create/{project?}', 'Project\ProjectTaskController@create')->name('tasks.create');
            Route::get('/tasks/{project?}', 'Project\ProjectTaskController@index')->name('tasks.index');
            Route::post('tasks/destroy', 'Project\ProjectTaskController@destroy')->name('tasks.destroy');


            /* Services */
            Route::resource('services', 'Services\ServicesController');

            /* Portfolio */
            Route::resource('portfolio', 'Services\PortfolioController');

            /* Career */
            Route::resource('career', 'Career\CareerController');

            /* Other Pages */
            Route::resource('other-pages', 'OtherPages\OtherPagesController');

            /* Blog */
            Route::resource('blog', 'Blog\BlogController');
            Route::resource('news', 'NewsController');

            /* Request Service */
            Route::resource('services-request', 'Services\ServiceRequestController');

            /* Contacts */
            Route::resource('contacts', 'ContactUs\ContactUsController');

            /* Users Controller */
            Route::resource('users', 'Dashboard\Users\UsersController');
            Route::post('users/destroy', 'Dashboard\Users\UsersController@destroy')->name('users.destroy');

            /* CKEditor Image Upload */
            Route::post('ckeditor/upload/{path}', 'Dashboard\CKEditorController@upload')->name('ckeditor.image-upload');
        });
    });
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::group(['prefix' => 'kavax-spacex-cmd', 'middleware' => 'auth'], function () {

    Route::get('/niye-asho', function () {

        print("<pre>");

        $result = shell_exec("cd admin-panel && git pull origin main");
        echo $result;
        print("</pre>");
    });
    Route::get('/ki-obstha', function () {

        print("<pre>");

        $result = shell_exec("cd admin-panel && git status");
        echo $result;
        print("</pre>");
    });

    Route::get('/murgi-niye-asho', function () {

        print("<pre>");

        $result = shell_exec("cd app && git pull origin tawsif-v1");
        echo $result;
        print("</pre>");
    });
    Route::get('/murgir-ki-obstha', function () {

        print("<pre>");

        $result = shell_exec("cd app && git status");
        echo $result;
        print("</pre>");
    });
    /* Clear Cache */
    Route::get('/clear-cache', function () {
        Artisan::call('migrate');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
        return 'DONE';
    });
});



// Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/* Other Pages */
Route::get('{slug}', 'OtherPages\OtherPagesController@show');
Route::get('email-temp', function () {
    return view('email.template');
});
