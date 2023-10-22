<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::orderBy('created_at', 'DESC')->get();

        if (auth()->user()->role_id == 1) {
            return view('master.user.index')->with('user', $user);
        } else {
            return view('errors.403');
        }
    }

    public function add(Request $request)
    {
        if (auth()->user()->role_id == 1) {
            $role = Role::get();
            return view('master.user.form')->with('role', $role);
        } else {
            return view('errors.403');
        }
    }

    public function edit(Request $request)
    {
        $user = User::find($request->user_id);

        if (auth()->user()->role_id == 1) {
            $role = Role::get();
            return view('master.user.edit')->with('user', $user)->with('role', $role);
        } else {
            return view('errors.403');
        }
    }

    public function show(Request $request)
    {
        $user = User::find($request->user_id);

        if (auth()->user()->role_id == 1) {
            return view('master.user.show')->with('user', $user);
        } else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'integer']
        ]);

        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->save();

            DB::commit();

            $user = User::all();

            return redirect()->route('master-user-index')->with('user', $user)->with('success', 200)->with('message', 'User stored successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to store User, contact Administrator!');
        }
    }

    public function update(Request $request, $user_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'integer']
        ]);

        $user = User::findOrFail($user_id);

        try {
            DB::beginTransaction();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->save();

            DB::commit();

            $user = User::all();

            return redirect()->route('master-user-index')->with('user', $user)->with('success', 200)->with('message', 'User updated successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to update User, contact Administrator!');
        }
    }

    public function delete(Request $request, $user_id)
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', $user_id)->delete();

            DB::commit();
            $user = User::all();

            return redirect()->back()->with('user', $user)->with('success', 200)->with('message', 'User deleted successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to delete User, contact Administrator!');
        }
    }
    
    public function reset(Request $request, $user_id){
        try {
            DB::beginTransaction();
            $user = User::where('id', $user_id)->first();
            $user->password = Hash::make('password123');
            $user->save();

            DB::commit();
            $user = User::all();

            return redirect()->back()->with('user', $user)->with('success', 200)->with('message', 'User password reset successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to reset User password, contact Administrator!');
        }
    }
}
