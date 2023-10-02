<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index(){
  		return view('home.index');
    }

    public function profile(){
        $users = User::where('id',Auth::user()->id)->first();
        return view('home.profile',compact('users'));
    }
    
    public function edit_profile(Request $request){
       
        $validated = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $update = User::find($request->id);
        $update->name = $request['name'];
        $update->mobile_no = $request['mobile_no'];
        $update->address = $request['address'];
        $update->email = $request['email'];
        $update->password = isset($request->password) ? Hash::make($request->password):$update->password;
        $data = $update->save();
        if($data){
            return redirect('dashboard');
        }else{
            return redirect('profile');
        }
    }
}
