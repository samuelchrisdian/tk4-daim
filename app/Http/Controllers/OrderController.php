<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::orderBy('created_at', 'DESC')->get();

        if (auth()->user()->role_id == 1) {
            return view('transaction.order.index')->with('order', $order);
        } else {
            return view('errors.403');
        }
    }

    public function add(Request $request)
    {
        if (auth()->user()->role_id == 1) {
            $item = Item::get();
            return view('transaction.order.form')->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function edit(Request $request)
    {
        $order = Order::find($request->order_id);

        if (auth()->user()->role_id == 1) {
            $item = Item::get();
            return view('transaction.order.edit')->with('order', $order)->with('item', $item);
        } else {
            return view('errors.403');
        }
    }

    public function show(Request $request)
    {
        $order = Order::find($request->order_id);

        if (auth()->user()->role_id == 1) {
            return view('transaction.order.show')->with('order', $order);
        } else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'qty' => ['required', 'integer']
        ]);

        try {
            DB::beginTransaction();

            $order = new Order();
            $order->item_id = $request->item_id;
            $order->name = $request->name;
            $order->qty = $request->qty;
            $order->status = 0;
            $order->save();

            DB::commit();

            $order = Order::all();

            return redirect()->route('transaction-order-index')->with('order', $order)->with('success', 200)->with('message', 'Order stored successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to store Order, contact Administrator!');
        }
    }

    public function update(Request $request, $order_id)
    {
        $validated = $request->validate([
            'item_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'qty' => ['required', 'integer']
        ]);

        $order = Order::findOrFail($order_id);

        try {
            DB::beginTransaction();

            $order->item_id = $request->item_id;
            $order->name = $request->name;
            $order->qty = $request->qty;
            $order->status = 0;
            $order->save();

            DB::commit();

            $order = Order::all();

            return redirect()->route('transaction-order-index')->with('order', $order)->with('success', 200)->with('message', 'Order updated successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to update Order, contact Administrator!');
        }
    }

    public function delete(Request $request, $order_id)
    {
        try {
            DB::beginTransaction();
            $order = Order::where('item_id', $order_id)->delete();

            DB::commit();
            $order = Order::all();

            return redirect()->back()->with('order', $order)->with('success', 200)->with('message', 'Order deleted successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->back()->with('failed', 500)->with('message', 'Failed to delete Order, contact Administrator!');
        }
    }
}
