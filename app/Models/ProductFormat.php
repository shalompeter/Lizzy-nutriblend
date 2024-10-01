<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class ProductFormat extends Model
{
    public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}

    use HasFactory;
}
