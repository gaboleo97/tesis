<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Register extends Model
{
    use HasFactory;
    public function inventory() {
        return $this->hasMany('App\Models\Inventory');
    }
}
