<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index(){

        $users = User::all();
        return view('admin.user.index' , compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف الحساب بنجاح'];

        return redirect()->back()->with($notification);


    }

}
