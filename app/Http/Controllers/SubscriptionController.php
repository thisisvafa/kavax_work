<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSeo(){
        return view('site.pages.subscription.seo-package');
    }

    public function getBranding(){
        return view('site.pages.subscription.branding-package');
    }

    public function getSocialMedia(){
        return view('site.pages.subscription.social-media-package');
    }

    public function getwebsite(){
        return view('site.pages.subscription.website-package');
    }

    public function getvideo(){
        return view('site.pages.subscription.video-package');
    }

    // public function getWebsiteID($id){
    //     return view('site.pages.services.request', compact('id'));

    // }
}
