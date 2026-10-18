<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['delivery_zone_id', 'zone_name', 'addresse', 'fulfillmentMode', 'note', 'subtotal', 'discount_percentage', 'discount_amount', 'delivery_fee', 'total', 'status', 'stock_applied', 'stock_restored', 'canceled_at'])]
class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
}
