<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_lists extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_number', 'amount_total', 'schedule', 'retirement_date', 'list_products', 'delivery', 'store_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'list_products' => 'object',
        'amount_total'  => 'float'
    ];

    /**
     * @var bool[]
     */
    protected $attributes = [];

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function savee($data)
    {
        return Order_lists::create($data);
    }
}
