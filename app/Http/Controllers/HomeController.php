<?php

namespace App\Http\Controllers;

use App\Model\Portfolio;
use Illuminate\Http\Request;
use App\Model\ContactUs;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $portfolios = Portfolio::with('categories')->get();
//        dd($portfolios);
        return view('site.pages.index');
    }

    public function privacyPolicy()
    {
        return view('site.pages.privacy-policy');
    }

    public function webMaintenance()
    {
        return view('site.pages.web-maintenance');
    }

    public function letsTalk(Request $request)
    {
        $ContactUsMeta = (array)$request->all();
        $ContactUsMeta['status'] = 'new';
        if (ContactUs::create($ContactUsMeta)) {
            Mail::to($request->email)->send(new SendMail(
                $request->name,
                "New Mail",
                "Mail message."
            ));
            return redirect()->back()->with('notification', [
                'class' => 'success',
                'message' => 'Your message has been successfully registered and we will contact you shortly.'
            ]);
        }
    }

    public function test(){
        return view('site.pages.subscription.slider');
    }
}
