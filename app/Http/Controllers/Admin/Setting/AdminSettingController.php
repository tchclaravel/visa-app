<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Bank;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index(){
        $appointments = Appointment::all();
        $banks = Bank::all();
        return view('admin.setting.index' , compact('appointments' , 'banks'));
    }

}
