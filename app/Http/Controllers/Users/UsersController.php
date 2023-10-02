<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::with('user_type:id,name')->where('user_type_id','=','2')->paginate(5);
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.add');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|unique:users',
            'email' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();

        $add = new User();
        $add->name = $input['name'];
        $add->mobile_no = $input['mobile_no'];
        $add->address = $input['address'];
        $add->email = $input['email'];
        $add->password =  Hash::make($input['password']);
        $add->user_type_id = '2';
        $data = $add->save();

        if($data){
            return redirect()->to('users');
        }else{
            return view('users.add');
        }
          
    }

    public function edit($id){
        $users = User::where('id',$id)->first();
        return view('users.edit',compact('users'));
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->to('users');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $input = $request->all();
        $update = User::find($request->id);
        $update->name = isset($input['name']) ? $input['name']:'';
        $update->mobile_no = isset($input['mobile_no']) ? $input['mobile_no']:'';
        $update->address = isset($input['address']) ? $input['address']:'';
        $update->email = isset($input['email']) ? $input['email']:'';
    
        $data = $update->save();
        if($data){
            return redirect()->to('users');
        }else{
            return redirect()->to('users/edit/'.$request->id);
        }
    }

}
