<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function list(){
        $data = [];                
        $data["title"] = "Lista de Usarios";
        $data["user"] = User::all();
        return view('user.list')->with("data",$data);
    }

    public function edit($id){
        $data = [];
        $user = User::findOrFail($id);
        $data["title"] = $user->getName();
        $data["user"] = $user;
        return view('user.edit')->with("data", $data);
    }

    public function saveEdit(Request $request){
        $request->validate(User::validate());
        $id =$request->input('id');
        User::where('id',$id)->update([
            'user' => $request->input('user'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $message = Lang::get('messages.postCreated');
        return redirect()->route('home.index')->with('success',$message);
    }

}
