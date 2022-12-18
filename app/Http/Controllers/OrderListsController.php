<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderListCollection;
use App\Http\Resources\OrderListResource;
use App\Models\Order_lists;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OrderListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $sql = Order_lists::with('store')->get();
        $data = new OrderListCollection($sql);

        return Inertia::render('OrderPurchace', [
            'orders' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['delivery'] = ($input['amount_total'] * 0.13);

        try {
            Order_lists::savee($input);

            return Redirect::back()->with([
                'message' => __('messages.save')
            ]);
        } catch (QueryException $e) {
            Log::error('OrderListsController.store', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order_lists $order_lists
     * @return \Inertia\Response
     */
    public function show(Order_lists $order_lists, $id)
    {
        $sql = $order_lists::where('id', $id)->with('store')->first();
        $data = new OrderListResource($sql);

        return Inertia::render('OrderDetails', [
            'order' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order_lists $order_lists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_lists $order_lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order_lists $order_lists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_lists $order_lists)
    {
        //
    }
}
