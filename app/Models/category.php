<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // one category has many products 
    public function products(){
        return $this->hasMany(product::class,'categoryId','id');
    }
}