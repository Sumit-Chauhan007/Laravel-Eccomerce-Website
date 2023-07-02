<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = [
        'item',
    ];

    public function getItemAttribute()
    {
        $item = Items::select('Name','Price','Image')->where('uuid',$this->item_uuid)->first();
        return $item;
    }
}
