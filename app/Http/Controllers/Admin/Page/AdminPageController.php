<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    
    public function edit($page_title)
    {


        // Create Defualt page 
        if($page_title =! 'privacy_policy' || $page_title =! 'terms_of_use'){
            $notification = ['alert-type' => 'warning' , 'message' => ' هذه الصفحة غير موجوده '];
            return redirect()->back()->with($notification);
        }

        Page::create([
            'page_title' => $page_title
        ]);

       $page = Page::where('page_title' , $page_title)->first();

       return view('admin.setting.update_page' , compact('page'));


    }

}
