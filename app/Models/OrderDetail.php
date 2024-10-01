<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductFormat;
use App\Models\Flavour;


class OrderDetail extends Model
{
    public function order()
{
    return $this->belongsTo(Order::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}

public function productFormat()
{
    return $this->belongsTo(ProductFormat::class);
}

public function flavour()
{
    return $this->belongsTo(Flavour::class);
}

    use HasFactory;
}
