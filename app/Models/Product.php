<?php

namespace App\Models;

use App\Enums\StockStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'price' => 'decimal:2',
        'stock_status' => StockStatus::class . ':default',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function stats()
    {
        return $this->hasMany(ProductStats::class);
    }

    public function insights()
    {
        return $this->belongsToMany(Insight::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
