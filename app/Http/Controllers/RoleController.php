<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::orderBy('created_at', 'DESC')->get();

        if (auth()->user()->role_id == 1) {
            return view('master.role.index')->with('role', $role);
        } else {
            return view('errors.403');
        }
    }

    public function add(Request $request)
    {
        if (auth()->user()->role_id == 1) {
            return view('master.role.form');
        } else {
            return view('errors.403');
        }
    }

    public function edit(Request $request)
    {
        $role = Role::find($request->item_id);

        if (auth()->user()->role_id == 1) {
            return view('master.role.edit')->with('role', $role);
        } else {
            return view('errors.403');
        }
    }

    public function show(Request $request)
    {
        $role = Role::find($request->item_id);

        if (auth()->user()->role_id == 1) {
            return view('master.role.show')->with('role', $role);
        } else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        try {
            DB::beginTransaction();

            $role = new Role();
            $role->name = $request->name;
            $role->save();

            DB::commit();

            $role = Role::all();

            return redirect()->route('master-role-index')->with('role', $role)->with('success', 200)->with('message', 'Role stored successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to store Role, contact Administrator!');
        }
    }

    public function update(Request $request, $item_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $role = Role::findOrFail($item_id);

        try {
            DB::beginTransaction();

            $role->name = $request->name;
            $role->save();

            DB::commit();

            $role = Role::all();

            return redirect()->route('master-role-index')->with('role', $role)->with('success', 200)->with('message', 'Role updated successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to update Role, contact Administrator!');
        }
    }

    public function delete(Request $request, $item_id)
    {
        try {
            DB::beginTransaction();
            $role = Role::where('item_id', $item_id)->delete();

            DB::commit();
            $role = Role::all();

            return redirect()->back()->with('role', $role)->with('success', 200)->with('message', 'Role deleted successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to delete Role, contact Administrator!');
        }
    }
}
