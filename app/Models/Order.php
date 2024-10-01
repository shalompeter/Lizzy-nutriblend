<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;

class Order extends Model
{
    public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}

public function payment()
{
    return $this->hasOne(Payment::class);
}

public function shipping()
{
    return $this->hasOne(Shipping::class);
}

    use HasFactory;
}
