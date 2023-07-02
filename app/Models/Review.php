<?php

namespace App\Models;

use App\Models\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HashUuid;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string'
      ];

    protected $KeyType = 'string';
    public $increment = false;


}
