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
                'name'                  => $row->name,
                'direction'             => $row->direction,
                'hours_operation_start' => Carbon::parse($row->hours_operation_start)->format('h:m'),
                'hours_operation_end'   => Carbon::parse($row->hours_operation_end)->format('h:m'),
                'rating'                => $row->rating,
                'large_image'           => $row->large_image,
                'small_image'           => $row->small_image,
                'product'               => $row->product
            ];
        })->sortBy('name');
    }
}
