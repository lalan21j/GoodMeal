<?php

namespace App\Http\Controllers;

use App\Models\Order_lists;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['delivery'] = ($input['amount_total'] * 0.13) + $input['amount_total'];

        try {
            Order_lists::savee($input);

            return response()->json(['message' => __('messages.save')], 201);
        } catch (QueryException $e) {
            Log::error('OrderListsController.store', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order_lists $order_lists
     * @return \Illuminate\Http\Response
     */
    public function show(Order_lists $order_lists)
    {
        //
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
