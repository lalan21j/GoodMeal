<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Products::all('name', 'quantity', 'price', 'store_id', 'description', 'offer_price')->sortBy('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Products::savee($request->all());

            return response()->json(['message' => __('messages.save')], 201);
        } catch (QueryException $e) {
            Log::error('ProductsController.store', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Products $products)
    {
        try {
            $products::modify($request->except(['id']), $request->id);

            return response()->json(['message' => __('messages.update')]);
        } catch (QueryException $e) {
            Log::error('ProductsController.update', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Products $products, $product)
    {
        try {
            $products::remove($product);

            return response()->json(['message' => __('messages.remove')]);
        } catch (QueryException $e) {
            Log::error('ProductsController.destroy', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }
}
