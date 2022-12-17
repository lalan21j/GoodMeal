<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
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
    public function store(ProductRequest $request)
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
    public function update(ProductRequest $request, Products $products)
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
