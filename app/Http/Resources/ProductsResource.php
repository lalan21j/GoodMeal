<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ProductsResource extends JsonResource
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
            'name'                  => $this->name,
            'direction'             => $this->direction,
            'hours_operation_start' => Carbon::parse($this->hours_operation_start)->format('h:m'),
            'hours_operation_end'   => Carbon::parse($this->hours_operation_end)->format('h:m'),
            'rating'                => $this->rating,
            'large_image'           => $this->large_image,
            'small_image'           => $this->small_image,
            'product'               => $this->product
        ];
    }
}
