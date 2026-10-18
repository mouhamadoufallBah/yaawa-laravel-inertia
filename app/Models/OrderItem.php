<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['order_id', 'product_id', 'name', 'units', 'unit_price', 'quantity', 'line_total'])]
class OrderItem extends Model
{
    //
}
