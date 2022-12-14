<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\StoreCollection;
use App\Models\Store;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $sql = Store::with('type_delivery')->get();
        $data = new StoreCollection($sql);

        return Inertia::render('Welcome', [
            'store' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            Store::store($request->all());

            return response()->json(['message' => __('messages.save')], 201);
        } catch (QueryException $e) {
            Log::error('StoreController.store', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Store $store
     * @return \Inertia\Response
     */
    public function show(Store $store)
    {
        $sql = $store::with('product')->where('id', $store->id)->first();
        $data = new ProductsResource($sql);

        return Inertia::render('Product', [
            'products' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreRequest $request, Store $store)
    {
        try {
            $store::modify($request->except(['id']), $request->id);

            return response()->json(['message' => __('messages.update')]);
        } catch (QueryException $e) {
            Log::error('StoreController.update', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $stores
     * @param Store $store
     * @return JsonResponse
     */
    public function destroy(Store $stores, $store)
    {
        try {
            $stores::remove($store);

            return response()->json(['message' => __('messages.remove')]);
        } catch (QueryException $e) {
            Log::error('StoreController.destroy', [$e]);

            return response()->json(['message' => __('messages.error')], 500);
        }
    }
}
