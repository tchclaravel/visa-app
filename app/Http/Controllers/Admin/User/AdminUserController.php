<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index(){

        $users = User::latest()->paginate(10);
        return view('admin.user.index' , compact('users'));
    }


    public function search(Request $request){

        $results = User::where('account_id' , 'LIKE' , '%'.$request->input.'%')
                ->orWhere('phone' , 'LIKE' , '%'.$request->input.'%')->get();

        return view('admin.user.search' , compact('results' , 'request'));
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف الحساب بنجاح'];

        return redirect()->back()->with($notification);


    }

}
