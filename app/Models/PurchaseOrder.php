<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'user_id',
        'status'
    ];
    public function supplier() {
        return $this->belongsTo(Suppliers::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}

