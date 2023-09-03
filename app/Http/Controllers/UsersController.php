<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $url = url('/user');
        $user = new User();
        $title = "User add";
        $roles = Role::all();
        $data = compact('url', 'title', 'user', 'roles');
        return view('admin.users')->with($data);
    }

    public function store(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return back()->with('error', 'Email already exists');
        }
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ]
        );

        // Retrieve all Roles
        $roles = Role::all();

        //Insert Query
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();

        return redirect('/user/view');
    }

    public function view(Request $request)
    {
        $title = "Users List";
        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $users = User::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->Paginate(5);
        } else {
            $users = User::orderBy('name')->Paginate(5);
        }

        $data = compact('users', 'search', 'title');
        return view('admin.users-view')->with($data);
    }

    //Delete Query
    public function delete($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect('user/view');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            //not found
            return redirect('user/view');
        } else {
            $url = url('/user/update') . "/" . $id;
            $title = "Update";
            $roles = Role::all();
            $data = compact('url', 'title', 'user', 'roles');
            return view('admin.users')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return back()->with('error', 'Email already exists');
        }
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();

        return redirect('user/view');
    }
}
