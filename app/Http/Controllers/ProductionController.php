<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductionController extends Controller
{
    public function index(Request $request)
    {
        $production = Production::orderBy('created_at', 'DESC')->get();

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 5) {
            return view('transaction.production.index')->with('production', $production);
        } else {
            return view('errors.403');
        }
    }

    public function add(Request $request)
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 5) {
            $order = Order::where('status', 0)->get();
            $item = Item::get();
            return view('transaction.production.form')->with('order', $order)->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function edit(Request $request)
    {
        $production = Production::find($request->production_id);

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 5) {
            $order = Order::where('status', 0)->get();
            $item = Item::get();
            return view('transaction.production.edit')->with('order', $order)->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function show(Request $request)
    {
        $production = Production::find($request->production_id);

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 5) {
            return view('transaction.production.show')->with('production', $production);
        } else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => ['required', 'integer'],
            'item_id' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'lead_time' => ['required', 'integer']
        ]);

        try {
            DB::beginTransaction();

            $production = new Production();
            $production->order_id = $request->order_id;
            $production->item_id = $request->item_id;
            $production->qty = $request->qty;
            $production->lead_time = $request->lead_time;
            $production->save();

            $order = Order::where('order_id', $request->order_id)->first();
            $order->status = 1;
            $order->save();

            DB::commit();

            $production = Production::all();

            return redirect()->route('transaction-production-index')->with('production', $production)->with('success', 200)->with('message', 'Production stored successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to store Production, contact Administrator!');
        }
    }

    public function update(Request $request, $production_id)
    {
        $validated = $request->validate([
            'order_id' => ['required', 'integer'],
            'item_id' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'lead_time' => ['required', 'integer']
        ]);

        $production = Production::findOrFail($production_id);

        try {
            DB::beginTransaction();

            $production->order_id = $request->order_id;
            $production->item_id = $request->item_id;
            $production->qty = $request->qty;
            $production->lead_time = $request->lead_time;
            $production->save();

            $order = Order::where('order_id', $request->order_id)->first();
            $order->status = 1;
            $order->save();

            DB::commit();

            $production = Production::all();

            return redirect()->route('transaction-production-index')->with('production', $production)->with('success', 200)->with('message', 'Production updated successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to update Production, contact Administrator!');
        }
    }

    public function delete(Request $request, $production_id)
    {
        try {
            DB::beginTransaction();
            $production = Production::where('production_id', $production_id)->delete();

            DB::commit();
            $production = Production::all();

            return redirect()->back()->with('production', $production)->with('success', 200)->with('message', 'Production deleted successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to delete Production, contact Administrator!');
        }
    }
}
