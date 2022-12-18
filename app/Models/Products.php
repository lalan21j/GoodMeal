<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'quantity', 'price', 'store_id', 'description', 'offer_price', 'small_image'
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
        'price'       => 'float',
        'offer_price' => 'float'
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
        return Products::create($data);
    }

    /**
     * @param $product
     * @return void
     */
    public static function remove($product)
    {
        Products::where('id', $product)->delete();
    }

    /**
     * @param $request
     * @param $id
     * @return void
     */
    public static function modify($request, $id)
    {
        Products::where('id', $id)->update($request);
    }
}
