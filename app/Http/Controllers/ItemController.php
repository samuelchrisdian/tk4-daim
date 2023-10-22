<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $item = Item::orderBy('created_at', 'DESC')->get();

        if (auth()->user()->role_id == 1) {
            return view('master.item.index')->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function add(Request $request)
    {
        if (auth()->user()->role_id == 1) {
            return view('master.item.form');
        } else {
            return view('errors.403');
        }
    }

    public function edit(Request $request)
    {
        $item = Item::find($request->item_id);

        if (auth()->user()->role_id == 1) {
            return view('master.item.edit')->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function show(Request $request)
    {
        $item = Item::find($request->item_id);

        if (auth()->user()->role_id == 1) {
            return view('master.item.show')->with('item', $item);
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

            $item = new Item();
            $item->name = $request->name;
            $item->save();

            DB::commit();

            $item = Item::all();

            return redirect()->route('master-item-index')->with('item', $item)->with('success', 200)->with('message', 'Item stored successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to store Item, contact Administrator!');
        }
    }

    public function update(Request $request, $item_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $item = Item::findOrFail($item_id);

        try {
            DB::beginTransaction();

            $item->name = $request->name;
            $item->save();

            DB::commit();

            $item = Item::all();

            return redirect()->route('master-item-index')->with('item', $item)->with('success', 200)->with('message', 'Item updated successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to update Item, contact Administrator!');
        }
    }

    public function delete(Request $request, $item_id)
    {
        try {
            DB::beginTransaction();
            $item = Item::where('item_id', $item_id)->delete();

            DB::commit();
            $item = Item::all();

            return redirect()->back()->with('item', $item)->with('success', 200)->with('message', 'Item deleted successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to delete Item, contact Administrator!');
        }
    }
}
