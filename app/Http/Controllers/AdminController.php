<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function users(){
        $user_data = User::all();
        return view('admin.users', compact('user_data'));
    }
    public function deleteUser($id){
        $user_data = User::find($id);
        $user_data->delete();
        return redirect()->back();
    }
}
