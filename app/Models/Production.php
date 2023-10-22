<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'productions';
    protected $primaryKey = 'production_id';

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'item_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'order_id');
    }
}
