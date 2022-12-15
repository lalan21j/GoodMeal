<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($row, $key) {
            return [
                'id'          => $row->id,
                "name"        => $row->name,
                "quantity"    => $row->quantity,
                "price"       => $row->price,
                //"store"      => $row->type_delivery->name,
                "description" => $row->description,
                "offer_price" => $row->offer_price
            ];
        })->sortBy('name');
    }
}
