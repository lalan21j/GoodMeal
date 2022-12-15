<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'hours_operation_start', 'hours_operation_end', 'type_delivery_id', 'direction', 'rating'
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
        'hours_operation_start' => 'timestamp',
        'hours_operation_end'   => 'timestamp'
    ];

    /**
     * @var bool[]
     */
    protected $attributes = [];

    /**
     * @return BelongsTo
     */
    public function type_delivery(): BelongsTo
    {
        return $this->belongsTo(Type_delivery::class);
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function store($data)
    {
        return Store::create($data);
    }

    /**
     * @param $store
     * @return void
     */
    public static function remove($store)
    {
        Store::where('id', $store)->delete();
    }

    /**
     * @param $request
     * @param $id
     * @return void
     */
    public static function modify($request, $id)
    {
        Store::where('id', $id)->update($request);
    }
}
