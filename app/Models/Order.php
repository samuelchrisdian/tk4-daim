<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'item_id');
    }
}
