<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminList() {
        $admins = User::where('role','=','admin')->select()->get();
        return view('admin.list',compact('admins'));
    }
    public function adminCreate() {

        return view('admin.create');
    }
    public function adminAdd(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password =Hash::make($request->password);
        $users->role = 'admin';
        $users->save();
        return redirect('/admin/list');
    }
    public function adminDelete ($id) {
       User::findOrFail($id)->delete();
       return redirect('/admin/list');
    }
    public function adminEdit ($id) {
        $user = User::findOrFail($id);
        return view('admin.edit',compact('user'));
    }
    public function adminUpdate (Request $request,$id) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/admin/list');
    }
}
