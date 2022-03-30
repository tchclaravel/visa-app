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

       $page = Page::where('page_title' , '=' , $page_title)->first();

       if(!$page){
            $notification = ['alert-type' => 'warning' , 'message' => ' هذه الصفحة غير موجوده '];
            return redirect()->route('admin.settings')->with($notification);
       }

       return view('admin.setting.update_page' , compact('page'));

    }


    public function update(Request $request , $page_title)
    {
        $page = Page::where('page_title' , '=' , $page_title)->first();

        $page->update([
            'page_content' => $request->page_content,
        ]);

        $notification = ['alert-type' => 'success' , 'message' => ' تم تحديث الصفحة بنجاح '];
        return redirect()->route('admin.settings')->with($notification);

    }

}
