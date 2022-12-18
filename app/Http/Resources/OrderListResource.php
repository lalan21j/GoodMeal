<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'store_name'      => $this->store->name,
            'store_direction' => $this->store->direction,
            'schedule'        => Carbon::parse($this->store->hours_operation_start)->format('h:m') . ' - ' . Carbon::parse($this->store->hours_operation_end)->format('h:m'),
            'retirement_date' => Carbon::parse($this->retirement_date)->format('d/m/Y'),
            'order_number'    => $this->order_number,
            'list_products'   => $this->list_products,
            'delivery'        => $this->delivery,
            'amount_total'    => $this->amount_total,
            'total'           => $this->amount_total + $this->delivery,
        ];
    }
}
