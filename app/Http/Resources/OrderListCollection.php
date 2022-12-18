<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class OrderListCollection extends ResourceCollection
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
                'id'           => $row->id,
                'created_at'   => Carbon::parse($row->created_at)->format('d/m/Y'),
                'store_name'   => $row->store->name,
                'order_number' => $row->order_number,
                'amount_total' => $row->amount_total,
                'schedule'     => Carbon::parse($row->store->hours_operation_start)->format('h:m') . ' - ' . Carbon::parse($row->store->hours_operation_end)->format('h:m')
            ];
        })->sortBy('created_at');
    }
}
