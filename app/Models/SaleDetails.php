<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'quantity', 'product_id', 'sale_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
