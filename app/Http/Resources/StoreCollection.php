<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class StoreCollection extends ResourceCollection
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
                'id'                    => $row->id,
                'name'                  => $row->name,
                'hours_operation_start' => Carbon::parse($row->hours_operation_start)->format('h:m'),
                'hours_operation_end'   => Carbon::parse($row->hours_operation_end)->format('h:m'),
                'type_delivery'         => $row->type_delivery->name,
                'direction'             => $row->direction,
                'rating'                => $row->rating,
                'delivery_time'         => $row->delivery_time,
                'distance'              => $row->distance,
                'sales_day'             => $row->sales_day,
                'large_image'           => $row->large_image,
                'small_image'           => $row->small_image,
                'favorite'              => $row->favorite
            ];
        })->sortBy('name');
    }
}
