<?php

namespace App\Models;
use App\Models\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Items extends Model
{
    use HasFactory, HashUuid;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string'
      ];
    protected $appends =['Name_Categories'];
    protected $KeyType = 'string';
    public $increment = false;
    public function getNameCategoriesAttribute(){
        $Category = Category::where('uuid', $this->Category)->pluck('Name')->first();
        return $Category;
    }


}
