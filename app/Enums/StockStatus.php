<?php

namespace App\Enums;

enum StockStatus: string
{
    case InStock = 'In Stock';
    case LowStock = 'Low Stock';
    case OutOfStock = 'Out of Stock';
}
