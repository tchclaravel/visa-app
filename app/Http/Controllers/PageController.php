<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function privacyPolicy()
    {
        $page = Page::where('page_title' , 'privacy_policy')->first();
        return view('client.page.privacy_policy' , compact('page'));
    }


    public function termsOfUse()
    {
        $page = Page::where('page_title' , 'terms_of_use')->first();

        return view('client.page.terms_of_use' , compact('page'));
    }

}
