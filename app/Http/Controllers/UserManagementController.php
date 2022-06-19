<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    //
    public function index()
    {
        $this->authorize('admin');
        $user = DB::table('users')->get();
        return view('user_management.index', compact('user'), ['title' => 'Management - User Management', 'management' => User::all()]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('user_management.create', ["title" => "Tambah Data - User Management"]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        // hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect()->route('management.index')->with('success', 'User Berhasil Ditambahkan');
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;

        $user->password = Hash::make($user->password);
        $user->save();
        return redirect()->route('management.index')->with('success', 'User Berhasil Diubah');
    }

    public function edit(User $user)
    {
        $this->authorize('admin');
        return view('user_management.edit', compact('user'), ["title" => "Update Data User - User Management"]);
    }
    
    public function update_2(Request $request, User $user_2)
    {
        $user_2->name = $request->name;
        $user_2->username = $request->username;
        $user_2->email = $request->email;
        $user_2->role = $request->role;
        $user_2->password = $request->password;

        $user_2->password = Hash::make($user_2->password);
        $user_2->save();
        return redirect()->route('home.index')->with('success', 'User Berhasil Diubah');
    }

    public function edit_2(User $user_2)
    {
        $this->authorize('editor');
        return view('user_management_2.edit', compact('user_2'), ["title" => "Update Data User - User Management"]);
    }



    public function update_3(Request $request, User $user_3)
    {
        $user_3->name = $request->name;
        $user_3->username = $request->username;
        $user_3->email = $request->email;
        $user_3->role = $request->role;
        $user_3->password = $request->password;

        $user_3->password = Hash::make($user_3->password);
        $user_3->save();
        return redirect()->route('home.index')->with('success', 'User Berhasil Diubah');
    }

    public function edit_3(User $user_3)
    {
    
        return view('user_management_3.edit', compact('user_3'), ["title" => "Update Data User - User Management"]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        sleep(1);
        return back();
    }

    
}
