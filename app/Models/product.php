<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'intro',
        'categoryId',
    ];

    // one to one relationship the one product has or belongs to one category 
    // public function category(){
    //     return $this->hasOne(category::class,'id','categoryId');
    // }

    public function category(){
        return $this->belongsTo(category::class,'categoryId','id');
    }
}
