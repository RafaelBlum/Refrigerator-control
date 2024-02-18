<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductTransactionTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => ProductTransactionTypeEnum::class
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
