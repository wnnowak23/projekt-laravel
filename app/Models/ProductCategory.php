<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    /**
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name'
       
       
   ];

   public function products()
    {
        return $this->hasMany(Product::class);
    }

}
