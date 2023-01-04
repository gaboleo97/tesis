<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public function product_registers() {
        return $this->belongsTo('App\Models\Product_Register');
    }
    public function products() {
        return $this->belongsTo('App\Models\Product');
    }
}
