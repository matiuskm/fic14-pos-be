<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('users')
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('username', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->paginate(10);
            return view('pages.user.table', compact('users'))->render();
        }

        $users = DB::table('users')->paginate(10);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $data['role'] = $request->role;

            DB::table('users')->insert($data);
            return redirect('user')->with('success', 'User has been added');
        } catch (\Exception $e) {
            return redirect('user')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        return view('pages.user.show');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'username' => 'required|unique:users,username,' . $id,
                'role' => 'required|in:admin,staff,user',
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->role = $request->role;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect()->route('users.index')->with('success', 'User has been updated');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('users')->where('id', $id)->delete();
            return redirect()->route('users.index')->with('success', 'User has been deleted');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }
}
