<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'product_id',
        'quantity'
    ];
    public function product() {
        return $this->belongsTo(ProductsModel::class);
    }
}
