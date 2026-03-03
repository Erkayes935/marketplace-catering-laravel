<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'delivery_date',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'order__menus')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
